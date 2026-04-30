<?php

namespace App\Http\Controllers;

use App\Models\Relapse;
use App\Models\Vice;

class HomeController extends Controller
{
    /**
     * Dashboard user: hanya menampilkan data milik user yang sedang login.
     */
    public function index()
    {
        $userId = auth()->id();

        // Hanya ambil vice milik user ini
        $userVices = Vice::where('user_id', $userId);

        return view('user.pages.home.index', [
            // Statistik milik user sendiri
            'totalVices'    => $userVices->count(),
            'totalRelapses' => Relapse::whereHas('vice', fn ($q) => $q->where('user_id', $userId))->count(),
            'avgStreak'     => round($userVices->avg('streak_days') ?? 0, 1),

            // Distribusi severity milik user sendiri
            'vicesRendah' => (clone $userVices)->where('severity', 'rendah')->count(),
            'vicesSedang' => (clone $userVices)->where('severity', 'sedang')->count(),
            'vicesTinggi' => (clone $userVices)->where('severity', 'tinggi')->count(),

            // Highlight data personal
            'topStreakVices'  => (clone $userVices)->orderByDesc('streak_days')->take(5)->get(),
            'latestVices'     => (clone $userVices)->latest()->take(5)->get(),
            'latestRelapses'  => Relapse::with('vice')
                ->whereHas('vice', fn ($q) => $q->where('user_id', $userId))
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
