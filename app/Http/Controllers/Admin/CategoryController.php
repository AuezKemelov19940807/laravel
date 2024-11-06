<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['catalogs' => $categories] );
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::create([
            'name' => $request->input('name'),
            'text' => $request->input('text'),
            'top_description' => $request->input('top_description'),
            'bottom_description' => $request->input('bottom_description'),
            'budget' => $request->input('budget'),
        ]);

        return redirect()->route('catalog.show')->with('success', 'Catalog created successfully.');
    }


}
