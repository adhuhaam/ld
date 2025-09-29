<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrCode;
use App\Models\Scan;
use App\Models\Entry;
use App\Models\Winner;
use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_codes' => QrCode::count(),
            'active_codes' => QrCode::active()->count(),
            'total_scans' => Scan::count(),
            'today_scans' => Scan::whereDate('created_at', today())->count(),
            'total_entries' => Entry::count(),
            'today_entries' => Entry::whereDate('created_at', today())->count(),
            'total_winners' => Winner::count(),
            'pending_winners' => Winner::pending()->count(),
            'total_prizes' => Prize::active()->count(),
        ];

        // Recent activity
        $recent_scans = Scan::with('qrCode')
            ->latest()
            ->limit(10)
            ->get();

        $recent_entries = Entry::with('qrCode')
            ->latest()
            ->limit(10)
            ->get();

        // Charts data (last 30 days)
        $scan_chart_data = Scan::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $entry_chart_data = Entry::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recent_scans',
            'recent_entries',
            'scan_chart_data',
            'entry_chart_data'
        ));
    }
}
