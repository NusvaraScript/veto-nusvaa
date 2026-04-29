<?php

namespace App\Http\Controllers;

use App\Models\Relapse;
use App\Models\Vice;

class HomeController extends Controller
{
    /**
     * Tampilkan dashboard ringkasan statistik progres user.
     */
    public function index()
    {
        return view('pages.home.index', [
            // Statistik umum.
            'totalVices' => Vice::count(),
            'totalRelapses' => Relapse::count(),
            'avgStreak' => round(Vice::avg('streak_days') ?? 0, 1),

            // Distribusi vice berdasarkan tingkat severity.
            'vicesRendah' => Vice::where('severity', 'rendah')->count(),
            'vicesSedang' => Vice::where('severity', 'sedang')->count(),
            'vicesTinggi' => Vice::where('severity', 'tinggi')->count(),

            // Highlight data penting untuk dashboard.
            'topStreakVices' => Vice::orderByDesc('streak_days')->take(5)->get(),
            'latestVices' => Vice::latest()->take(5)->get(),
            'latestRelapses' => Relapse::with('vice')->latest()->take(5)->get(),
        ]);
    }
}
