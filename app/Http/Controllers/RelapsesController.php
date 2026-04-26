<?php

namespace App\Http\Controllers;

use App\Models\Relapse;
use App\Models\Vice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelapsesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'relapses' => Relapse::with('vice')->latest()->paginate(10)
        ];
        return view('pages.relapse.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $vices = Vice::all()->map(function ($vice) {
            return [
                'id' => $vice->id,
                'label' => $vice->habit_name . ' (' . ucfirst($vice->severity) . ')'
            ];
        });
        
        return view('pages.relapse.create', ['vices' => $vices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'vices_id' => 'required|exists:vices,id',
            'violation_date' => 'required|date',
            'excuse' => 'nullable|string|max:500'
        ]);

        try {
            DB::beginTransaction();
            
            // Simpan relapse
            $relapse = Relapse::create($validated);
            
            // Update streakvice ke 0 karena kambuh
            $vice = Vice::findOrFail($validated['vices_id']);
            $vice->update(['streak_days' => 0]);
            
            DB::commit();
            
            return to_route('relapse.index')->with('success', 'Relapse berhasil dicatat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan relapse: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Relapse $relapse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Relapse $relapse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Relapse $relapse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Relapse $relapse)
    {
        //
    }
}
