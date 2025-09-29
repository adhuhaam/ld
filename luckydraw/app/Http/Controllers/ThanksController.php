<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use Illuminate\Http\Request;

class ThanksController extends Controller
{
    public function show(Request $request)
    {
        $luckyId = $request->query('lucky');
        
        if (!$luckyId) {
            return redirect()->route('landing');
        }

        $qrCode = QrCode::where('lucky_id', $luckyId)->first();
        
        return view('public.thanks', compact('luckyId', 'qrCode'));
    }
}
