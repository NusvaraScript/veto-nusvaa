<?php

namespace App\Http\Controllers;

use App\Models\Relapse;
use App\Models\Vice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelapsesController extends Controller
{
    public function index()
    {
        return view('pages.relapse.index', [
            'relapses' => Relapse::with('vice')
                ->whereHas('vice', fn ($q) => $q->where('user_id', auth()->id()))
                ->latest()
                ->paginate(10),
        ]);
    }

    public function create()
    {
        // Hanya tampilkan vice milik user sendiri
        $vices = Vice::where('user_id', auth()->id())
            ->get()
            ->map(fn (Vice $vice) => [
                'id'    => $vice->id,
                'label' => $vice->habit_name.' ('.ucfirst($vice->severity).')',
            ]);

        return view('pages.relapse.create', ['vices' => $vices]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vices_id'       => 'required|exists:vices,id',
            'violation_date' => 'required|date',
            'excuse'         => 'nullable|string|max:500',
        ]);

        // Pastikan vice yang dipilih memang milik user ini
        $vice = Vice::where('id', $validated['vices_id'])
            ->where('user_id', auth()->id())
            ->firstOrFail();

        DB::transaction(function () use ($validated, $vice): void {
            Relapse::create($validated);
            $vice->update(['streak_days' => 0]);
        });

        return to_route('relapse.index')->with('success', 'Relapse berhasil dicatat!');
    }

    public function show(Relapse $relapse)
    {
        //
    }

    public function edit(Relapse $relapse)
    {
        //
    }

    public function update(Request $request, Relapse $relapse)
    {
        //
    }

    public function destroy(Relapse $relapse)
    {
        //
    }
}
