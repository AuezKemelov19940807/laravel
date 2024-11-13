<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();

        if ($catalogs->isEmpty()) {
            return response()->json([
                'message' => 'Данные каталога пусты',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'data' => $catalogs
        ]);

    }


    public function show(string $slug)
    {

        $catalog = Catalog::where('slug', $slug)->firstOrFail();

        $categories = $catalog->categories;


        if ($categories->isEmpty()) {
            return response()->json([
                'message' => 'Данные категорий пусты',
                'data' => []
            ], 404);
        }


        return response()->json([
            'message' => 'success',
            'data' => $categories
        ]);

    }

}
