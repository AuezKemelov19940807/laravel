<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CatalogController;






Route::controller(CatalogController::class)->group(function () {
    Route::prefix('catalog')->group(function () {
        Route::name('catalog.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
        });
    });
});

