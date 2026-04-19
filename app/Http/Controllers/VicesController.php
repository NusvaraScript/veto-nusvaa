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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vice $vice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vice $vice)
    {
        //
    }
}
