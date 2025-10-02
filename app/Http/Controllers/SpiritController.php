<?php

namespace App\Http\Controllers;

use App\Models\Spirit;
use Illuminate\Http\Request;

class SpiritController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'trademark' => ['nullable', 'string', 'max:50'],
            'color' => ['nullable', 'string', 'max:20'],
            'category' => ['nullable', 'string', 'max:30'],
            'making' => ['nullable', 'string', 'max:30'],
        ]);

        $spirits = Spirit::query()
            ->filter($filters)
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('pages.products.spirits.index', compact('spirits', 'filters'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Spirit $spirit)
    {

        return view('pages.products.spirits.show', compact('spirit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spirit $spirit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spirit $spirit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spirit $spirit)
    {
        //
    }
}
