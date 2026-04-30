<?php

namespace App\Http\Controllers;

use App\Models\Relapse;
use App\Models\User;
use App\Models\Vice;

class AdminController extends Controller
{
    /**
     * Dashboard admin: statistik global website, tanpa data pribadi user.
     */
    public function dashboard()
    {
        $totalUsers = User::where('role', 'user')->count();

        return view('admin.pages.dashboard', [
            // Statistik pengguna
            'totalUsers'         => $totalUsers,
            'newUsersThisMonth'  => User::where('role', 'user')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
            'newUsersThisWeek'   => User::where('role', 'user')
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->count(),

            // Statistik konten (agregat, bukan data personal)
            'totalVices'         => Vice::count(),
            'totalRelapses'      => Relapse::count(),
            'avgVicesPerUser'    => $totalUsers > 0 ? round(Vice::count() / $totalUsers, 1) : 0,
            'avgRelapsesPerUser' => $totalUsers > 0 ? round(Relapse::count() / $totalUsers, 1) : 0,

            // Severity breakdown (tanpa tau siapa pemiliknya)
            'vicesRendah'  => Vice::where('severity', 'rendah')->count(),
            'vicesSedang'  => Vice::where('severity', 'sedang')->count(),
            'vicesTinggi'  => Vice::where('severity', 'tinggi')->count(),

            // Daftar user terbaru (hanya info akun, bukan data kebiasaan)
            'recentUsers'  => User::where('role', 'user')
                ->latest()
                ->take(8)
                ->get(['id', 'name', 'email', 'created_at']),
        ]);
    }
}
