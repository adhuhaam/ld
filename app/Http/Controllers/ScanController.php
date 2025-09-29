<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use App\Models\Scan;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function show($code)
    {
        $qrCode = QrCode::active()->where('code', $code)->first();

        if (!$qrCode) {
            abort(404, 'QR code not found or inactive');
        }

        // Record the scan
        Scan::create([
            'qr_code_id' => $qrCode->id,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'referrer' => request()->header('referer'),
        ]);

        return view('public.form', compact('qrCode'));
    }

    public function qrImage($code)
    {
        $qrCode = QrCode::active()->where('code', $code)->first();

        if (!$qrCode) {
            abort(404, 'QR code not found');
        }

        $qr = \Endroid\QrCode\QrCode::create(url("/s/$code"))
            ->setSize(400);

        $writer = new \Endroid\QrCode\Writer\PngWriter();
        
        return response($writer->write($qr)->getString())
            ->header('Content-Type', 'image/png')
            ->header('Cache-Control', 'public, max-age=31536000');
    }
}
