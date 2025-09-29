<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameSession;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GameSessionController extends Controller
{
    /**
     * Start a new game session
     */
    public function start(Request $request, $code, $gameSlug)
    {
        // Find the QR code and game
        $qrCode = QrCode::active()->where('code', $code)->firstOrFail();
        $game = Game::active()->where('slug', $gameSlug)->firstOrFail();

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:120',
            'phone' => 'required|string|max:32',
            'consent' => 'required|accepted',
            'honeypot' => 'nullable|string', // Honeypot field
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Check honeypot
        if ($request->filled('honeypot')) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid submission'
            ], 400);
        }

        // Rate limiting per IP per game
        $rateLimitKey = 'game_session:' . $request->ip() . ':' . $game->id;
        if (RateLimiter::tooManyAttempts($rateLimitKey, $game->max_attempts)) {
            return response()->json([
                'success' => false,
                'message' => 'Too many attempts. Please try again later.'
            ], 429);
        }

        // Normalize phone number
        $phone = $this->normalizePhone($request->phone);

        // Check if user already has a session for this game from this QR code
        $existingSession = GameSession::where('qr_code_id', $qrCode->id)
            ->where('game_id', $game->id)
            ->where('phone', $phone)
            ->where('completed', false)
            ->first();

        if ($existingSession && $existingSession->hasRemainingAttempts()) {
            // Continue existing session
            $session = $existingSession;
        } else {
            // Create new session
            $session = GameSession::create([
                'qr_code_id' => $qrCode->id,
                'game_id' => $game->id,
                'name' => $request->name,
                'phone' => $phone,
                'consent' => true,
            ]);

            // Hit rate limiter
            RateLimiter::hit($rateLimitKey, 3600); // 1 hour
        }

        $session->markAsStarted();

        return response()->json([
            'success' => true,
            'session' => [
                'id' => $session->id,
                'session_id' => $session->session_id,
                'remaining_attempts' => $session->remaining_attempts,
                'time_limit' => $game->time_limit,
                'game_config' => $game->config,
            ]
        ]);
    }

    /**
     * Update game session progress
     */
    public function update(Request $request, $sessionId)
    {
        $session = GameSession::where('session_id', $sessionId)->firstOrFail();

        if ($session->completed) {
            return response()->json([
                'success' => false,
                'message' => 'Session already completed'
            ], 400);
        }

        // Validate game data
        $validator = Validator::make($request->all(), [
            'score' => 'required|integer|min:0',
            'game_data' => 'nullable|array',
            'completed' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->completed) {
            // Mark as completed
            $session->markAsCompleted($request->score, $request->game_data ?? []);
        } else {
            // Update progress
            $session->update([
                'game_data' => $request->game_data ?? [],
            ]);
        }

        return response()->json([
            'success' => true,
            'session' => [
                'id' => $session->id,
                'final_score' => $session->final_score,
                'completed' => $session->completed,
                'qualified_for_prize' => $session->qualified_for_prize,
            ]
        ]);
    }

    /**
     * Complete a game session
     */
    public function complete(Request $request, $sessionId)
    {
        $session = GameSession::where('session_id', $sessionId)->firstOrFail();

        if ($session->completed) {
            return response()->json([
                'success' => false,
                'message' => 'Session already completed'
            ], 400);
        }

        // Validate completion data
        $validator = Validator::make($request->all(), [
            'score' => 'required|integer|min:0',
            'game_data' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Mark as completed
        $session->markAsCompleted($request->score, $request->game_data ?? []);

        return response()->json([
            'success' => true,
            'session' => [
                'id' => $session->id,
                'final_score' => $session->final_score,
                'qualified_for_prize' => $session->qualified_for_prize,
                'formatted_duration' => $session->formatted_duration,
            ],
            'redirect_url' => route('game.completed', $session->session_id)
        ]);
    }

    /**
     * Get session status
     */
    public function status($sessionId)
    {
        $session = GameSession::where('session_id', $sessionId)->firstOrFail();

        return response()->json([
            'success' => true,
            'session' => [
                'id' => $session->id,
                'completed' => $session->completed,
                'final_score' => $session->final_score,
                'qualified_for_prize' => $session->qualified_for_prize,
                'remaining_attempts' => $session->remaining_attempts,
                'game' => [
                    'name' => $session->game->name,
                    'type' => $session->game->type,
                ]
            ]
        ]);
    }

    /**
     * Show completed game results
     */
    public function completed(Request $request, $sessionId)
    {
        $session = GameSession::where('session_id', $sessionId)->firstOrFail();

        if (!$session->completed) {
            return redirect()->route('scan.show', $session->qrCode->code);
        }

        return view('public.game-completed', compact('session'));
    }

    /**
     * Normalize phone number
     */
    protected function normalizePhone(string $phone): string
    {
        // Remove all non-digit characters
        $phone = preg_replace('/[^0-9+]/', '', $phone);

        // Add +960 if it's a local number without country code
        if (!str_starts_with($phone, '+')) {
            if (str_starts_with($phone, '960')) {
                $phone = '+' . $phone;
            } else {
                $phone = '+960' . $phone;
            }
        }

        return $phone;
    }
}