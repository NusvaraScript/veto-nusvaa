<?php

namespace App\Http\Controllers;

use App\Models\Vice;
use Illuminate\Http\Request;

class VicesController extends Controller
{
    /**
     * Hanya tampilkan vice milik user yang login.
     */
    public function index()
    {
        return view('user.pages.vice.index', [
            'vices' => Vice::where('user_id', auth()->id())->paginate(10),
        ]);
    }

    public function create()
    {
        return view('user.pages.vice.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'habit_name'  => 'required|string',
            'description' => 'nullable|string',
            'severity'    => 'required|in:rendah,sedang,tinggi',
            'streak_days' => 'nullable|integer|min:0',
        ]);

        Vice::create($validated + [
            'user_id'     => auth()->id(),
            'streak_days' => $validated['streak_days'] ?? 0,
        ]);

        return to_route('vice.index');
    }

    public function show(Vice $vice)
    {
        $this->authorizeVice($vice);
    }

    public function edit(Vice $vice)
    {
        $this->authorizeVice($vice);

        return view('user.pages.vice.edit', ['data' => $vice]);
    }

    public function update(Request $request, Vice $vice)
    {
        $this->authorizeVice($vice);

        $validated = $request->validate([
            'habit_name'  => 'required|string',
            'description' => 'nullable|string',
            'severity'    => 'required|in:rendah,sedang,tinggi',
            'streak_days' => 'required|integer|min:0',
        ]);

        $vice->update($validated);

        return to_route('vice.index');
    }

    public function destroy(Vice $vice)
    {
        $this->authorizeVice($vice);
        $vice->delete();

        return to_route('vice.index');
    }

    /**
     * Pastikan vice yang diakses milik user yang sedang login.
     */
    private function authorizeVice(Vice $vice): void
    {
        if ($vice->user_id !== auth()->id()) {
            abort(403, 'Kamu tidak punya akses ke kebiasaan ini.');
        }
    }
}
