<?php

namespace App\Http\Controllers;

use App\Models\Wine;
use Illuminate\Http\Request;

class WineController extends Controller
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

        $wines = Wine::query()
            ->filter($filters)
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('pages.products.wines.index', compact('wines', 'filters'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {
        return view('pages.products.wines.show', compact('wine'));
    }

    // app/Http/Controllers/WineController.php
    public function qvevri(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'trademark' => ['nullable', 'string', 'max:50'],
            'color' => ['nullable', 'string', 'max:20'],
            'category' => ['nullable', 'string', 'max:30'],
            'making' => ['nullable', 'string', 'max:30'],
        ]);

        $wines = Wine::where('making', 'qvevri')->get();

        $wines = Wine::query()
            ->where('making', 'qvevri')
            ->filter($filters)
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('pages.products.wines.qvevri', compact('wines', 'filters'));
    }
    public function classic(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'trademark' => ['nullable', 'string', 'max:50'],
            'color' => ['nullable', 'string', 'max:20'],
            'category' => ['nullable', 'string', 'max:30'],
            'making' => ['nullable', 'string', 'max:30'],
        ]);

        $wines = Wine::where('making', 'qvevri')->get();

        $wines = Wine::query()
            ->where('making', 'classic')
            ->filter($filters)
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('pages.products.wines.classic', compact('wines', 'filters'));
    }
    public function ceramics(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'trademark' => ['nullable', 'string', 'max:50'],
            'color' => ['nullable', 'string', 'max:20'],
            'category' => ['nullable', 'string', 'max:30'],
            'making' => ['nullable', 'string', 'max:30'],
        ]);

        $wines = Wine::where('bottle', 'ceramic')->get();

        $wines = Wine::query()
            ->where('bottle', 'ceramic')
            ->filter($filters)
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('pages.products.wines.ceramics', compact('wines', 'filters'));
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
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wine $wine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        //
    }
}
