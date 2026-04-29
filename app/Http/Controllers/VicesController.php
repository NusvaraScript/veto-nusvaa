<?php

namespace App\Http\Controllers;

use App\Models\Vice;
use Illuminate\Http\Request;

class VicesController extends Controller
{
    public function index()
    {
        return view('pages.vice.index', [
            'vices' => Vice::paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.vice.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'habit_name' => 'required|string',
            'description' => 'nullable|string',
            'severity' => 'required|in:rendah,sedang,tinggi',
            'streak_days' => 'nullable|integer|min:0',
        ]);

        Vice::create($validated + ['streak_days' => $validated['streak_days'] ?? 0]);

        return to_route('vice.index');
    }

    public function show(Vice $vice)
    {
        //
    }

    public function edit(Vice $vice)
    {
        return view('pages.vice.edit', ['data' => $vice]);
    }

    public function update(Request $request, Vice $vice)
    {
        $validated = $request->validate([
            'habit_name' => 'required|string',
            'description' => 'nullable|string',
            'severity' => 'required|in:rendah,sedang,tinggi',
            'streak_days' => 'required|integer|min:0',
        ]);

        $vice->update($validated);

        return to_route('vice.index');
    }

    public function destroy(Vice $vice)
    {
        $vice->delete();

        return to_route('vice.index');
    }
}
