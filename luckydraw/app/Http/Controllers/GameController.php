<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    /**
     * Show the game selection page
     */
    public function index(Request $request, $code)
    {
        // Find the QR code
        $qrCode = QrCode::active()->where('code', $code)->firstOrFail();

        // Get all active games
        $games = Game::active()->orderBy('difficulty_level')->get();

        return view('public.game-selection', compact('qrCode', 'games'));
    }

    /**
     * Show a specific game
     */
    public function show(Request $request, $code, $gameSlug)
    {
        // Find the QR code
        $qrCode = QrCode::active()->where('code', $code)->firstOrFail();

        // Find the game
        $game = Game::active()->where('slug', $gameSlug)->firstOrFail();

        return view('public.game-play', compact('qrCode', 'game'));
    }

    /**
     * Get game data for AJAX requests
     */
    public function getGameData(Request $request, $gameSlug)
    {
        $game = Game::active()->where('slug', $gameSlug)->firstOrFail();

        return response()->json([
            'game' => [
                'id' => $game->id,
                'name' => $game->name,
                'slug' => $game->slug,
                'type' => $game->type,
                'config' => $game->config,
                'time_limit' => $game->time_limit,
                'max_attempts' => $game->max_attempts,
                'min_score' => $game->min_score,
            ]
        ]);
    }

    /**
     * Get game statistics
     */
    public function getStats(Request $request, $gameSlug)
    {
        $game = Game::where('slug', $gameSlug)->firstOrFail();

        $stats = [
            'total_sessions' => $game->gameSessions()->count(),
            'completed_sessions' => $game->gameSessions()->completed()->count(),
            'qualified_sessions' => $game->gameSessions()->qualifiedForPrize()->count(),
            'average_score' => $game->gameSessions()->completed()->avg('final_score') ?? 0,
            'completion_rate' => 0,
        ];

        if ($stats['total_sessions'] > 0) {
            $stats['completion_rate'] = round(($stats['completed_sessions'] / $stats['total_sessions']) * 100, 1);
        }

        return response()->json($stats);
    }
}