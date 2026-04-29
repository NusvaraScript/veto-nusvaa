<?php

namespace App\Http\Controllers;

use App\Models\Relapse;
use App\Models\Vice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelapsesController extends Controller
{
    /**
     * Tampilkan daftar relapse terbaru dengan relasi vice.
     */
    public function index()
    {
        return view('pages.relapse.index', [
            'relapses' => Relapse::with('vice')->latest()->paginate(10),
        ]);
    }

    /**
     * Tampilkan form pencatatan relapse beserta opsi vice.
     */
    public function create()
    {
        $vices = Vice::all()->map(fn (Vice $vice) => [
            'id' => $vice->id,
            'label' => $vice->habit_name.' ('.ucfirst($vice->severity).')',
        ]);

        return view('pages.relapse.create', ['vices' => $vices]);
    }

    /**
     * Simpan data relapse dan reset streak vice ke 0 secara atomik.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vices_id' => 'required|exists:vices,id',
            'violation_date' => 'required|date',
            'excuse' => 'nullable|string|max:500',
        ]);

        DB::transaction(function () use ($validated): void {
            // Catat kejadian relapse terlebih dahulu.
            Relapse::create($validated);

            // Karena terjadi relapse, streak vice direset ke nol.
            Vice::findOrFail($validated['vices_id'])->update(['streak_days' => 0]);
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
