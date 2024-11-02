<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CatalogController;


Route::get('admin/catalog/index',[CatalogController::class,'index'])->name('admin.catalog.index');


