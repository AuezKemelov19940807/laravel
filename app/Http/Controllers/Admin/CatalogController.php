<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::all();
        return view('catalog.index', ['catalogs' => $catalogs] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Catalog::create($request->only('name')); // Mass assignment for creation
        return redirect()->route('catalog.index')->with('success', 'Catalog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $catalog = Catalog::where('slug', $slug)->firstOrFail();


        $categories = $catalog->categories;


        return view('catalog.show', [
            'catalog' => $catalog,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalog.edit', ['catalog' => $catalog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $catalog = Catalog::findOrFail($id);
        $catalog->update($request->only('name'));

        return redirect()->route('catalog.index')->with('success', 'Catalog updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();
        return redirect()->route('catalog.index')->with('success', 'Catalog deleted successfully.');

    }
}
