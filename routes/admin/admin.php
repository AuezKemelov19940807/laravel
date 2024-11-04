<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CatalogController;





Route::middleware('auth')->group(function () {

    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
});
