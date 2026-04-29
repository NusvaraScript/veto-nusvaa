<?php

namespace App\Http\Controllers;

use App\Models\Relapse;
use App\Models\User;
use App\Models\Vice;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.index', [
            'totalUsers' => User::count(),
            'totalAdmins' => User::where('role', 'admin')->count(),
            'totalVices' => Vice::count(),
            'totalRelapses' => Relapse::count(),
            'latestUsers' => User::latest()->take(5)->get(),
            'latestVices' => Vice::latest()->take(5)->get(),
            'latestRelapses' => Relapse::with('vice')->latest()->take(5)->get(),
        ]);
    }
}
