<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Catalog;
use Illuminate\Support\Str;
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

    public function createCategory($catalogSlug)
    {
        $catalog = Catalog::where('slug', $catalogSlug)->firstOrFail();
        return view('catalog.categories.create', ['catalog' => $catalog]);
    }
    public function indexCategory($catalogSlug) {
        $catalog = Catalog::where('slug', $catalogSlug)->firstOrFail();
        $categories = $catalog->categories;
        return view('catalog.categories.index', ['catalog' => $catalog, 'categories' => $categories]);
    }


    public function storeCategory(Request $request, $catalogSlug)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'nullable|string',
            'top_description' => 'nullable|string',
            'bottom_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Получаем каталог по slug
        $catalog = Catalog::where('slug', $catalogSlug)->firstOrFail();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/categories');
            $imagePath = asset('storage/' . str_replace('public/', '', $imagePath));
        }


        $budget = $request->has('budget') ? 1 : 0;

        Category::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'top_description' => $request->input('top_description'),
            'bottom_description' => $request->input('bottom_description'),
            'budget' => $budget,
            'image' => $imagePath,
            'catalog_id' => $catalog->id,
        ]);



        return redirect()->route('catalog.categories.index', $catalog->slug)->with('success', 'Category created successfully.');
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
