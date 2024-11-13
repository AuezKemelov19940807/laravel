<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['catalogs' => $categories] );
    }

    public function create()

    {
        $catalogs = Catalog::all();
        $categories = Category::all();
        return view('category.create', ['catalogs' => $catalogs, 'categories' => $categories ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:1000',
            'catalog_id' => 'required|exists:catalogs,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Проверка на допустимый формат изображения
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $imagePath = asset('storage/' . $imagePath);
        }

        $budget = $request->has('budget') ? 1 : 0;
        Category::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'catalog_id' => $request->input('catalog_id'),
            'top_description' => $request->input('top_description'),
            'bottom_description' => $request->input('bottom_description'),
            'budget' => $budget,
            'image' => $imagePath,
        ]);

        return redirect()->route('catalog.index')->with('success', 'Category created successfully.');
    }


}
