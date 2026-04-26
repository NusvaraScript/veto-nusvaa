<?php

namespace App\Http\Controllers;

use App\Models\Vice;
use App\Models\Relapse;

class HomeController extends Controller
{
    public function index()
    {
        // Statistik utama
        $totalVices = Vice::count();
        $totalRelapses = Relapse::count();
        $avgStreak = Vice::avg('streak_days') ?? 0;
        
        // Statistik berdasarkan severity
        $vicesRendah = Vice::where('severity', 'rendah')->count();
        $vicesSedang = Vice::where('severity', 'sedang')->count();
        $vicesTinggi = Vice::where('severity', 'tinggi')->count();
        
        // Kebiasaan dengan streak tertinggi
        $topStreakVices = Vice::orderByDesc('streak_days')->take(5)->get();
        
        // Kebiasaan terbaru
        $latestVices = Vice::latest()->take(5)->get();
        
        // Relapse terbaru
        $latestRelapses = Relapse::with('vice')->latest()->take(5)->get();
        
        $data = [
            'totalVices' => $totalVices,
            'totalRelapses' => $totalRelapses,
            'avgStreak' => round($avgStreak, 1),
            'vicesRendah' => $vicesRendah,
            'vicesSedang' => $vicesSedang,
            'vicesTinggi' => $vicesTinggi,
            'topStreakVices' => $topStreakVices,
            'latestVices' => $latestVices,
            'latestRelapses' => $latestRelapses,
        ];
        
        return view('pages.home.index', $data);
    }
}