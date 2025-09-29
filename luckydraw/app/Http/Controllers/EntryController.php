<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;

class EntryController extends Controller
{
    public function store(Request $request, $code)
    {
        $qrCode = QrCode::active()->where('code', $code)->first();

        if (!$qrCode) {
            abort(404, 'QR code not found or inactive');
        }

        // Rate limiting
        $key = "entry:" . $request->ip() . ":" . $qrCode->id;
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors(['phone' => 'Please try again later.']);
        }

        $validated = $request->validate([
            'name' => 'required|string|min:2|max:120',
            'phone' => 'required|string|min:7|max:15|regex:/^[\+]?[0-9\s\-\(\)]+$/',
            'consent' => 'required|accepted',
            'honeypot' => 'nullable|max:0', // Anti-bot measure
        ], [
            'consent.accepted' => 'You must agree to the terms to participate.',
            'honeypot.max' => 'Invalid submission.',
            'phone.regex' => 'Please enter a valid phone number.',
        ]);

        // Check for existing entry from same IP and QR code
        $existingEntry = Entry::where('qr_code_id', $qrCode->id)
            ->where('phone', $validated['phone'])
            ->first();

        if ($existingEntry) {
            return back()->withErrors(['phone' => 'You have already entered with this phone number.']);
        }

        // Normalize phone number
        $phone = preg_replace('/[^0-9+]/', '', $validated['phone']);
        if (!str_starts_with($phone, '+')) {
            if (str_starts_with($phone, '960')) {
                $phone = '+' . $phone;
            } else {
                $phone = '+960' . $phone;
            }
        }

        Entry::create([
            'qr_code_id' => $qrCode->id,
            'name' => $validated['name'],
            'phone' => $phone,
            'consent' => true,
        ]);

        // Hit rate limiter
        RateLimiter::hit($key, 900); // 15 minutes

        return redirect()->route('thanks', ['lucky' => $qrCode->lucky_id]);
    }
}
