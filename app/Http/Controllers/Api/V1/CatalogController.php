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
        return response()->json($catalogs);
    }
}
