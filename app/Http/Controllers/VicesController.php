<?php

namespace App\Http\Controllers;

use App\Models\Vice;
use Illuminate\Http\Request;

class VicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'vices' => Vice::paginate(10)
        ];
        return view('pages.vice.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.vice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $relapse = Vice::create($request->validate([
            'habit_name' => 'required|string',
            'description' => 'nullable|string',
            'severity' => 'required|integer|min:1|max:10',
            'streak_days' => 'required|integer|min:0'
        ]));
        return to_route('vice.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vice $vice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vice $vice)
    {
        //
        $data = Vice::findOrFail($vice->id);
        return view('pages.vice.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vice $vice)
    {
        //
        $data = Vice::findOrFail($vice->id);
        $data->update($request->all());
        return to_route('vice.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vice $vice)
    {
        //
        Vice::findOrFail($vice->id)->delete();
        return to_route('vice.index');
    }
}
