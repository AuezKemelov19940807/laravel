<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CatalogController;

Route::controller(CatalogController::class)->group(function () {
    Route::prefix('catalog')->group(function () {
        Route::name('catalog.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/{slug}', 'show')->name('show');
            Route::post('/', 'store')->name('store');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');


            Route::get('/{catalog}/categories', 'indexCategory')->name('categories.index');
            Route::get('/{catalog}/categories/create', 'createCategory')->name('categories.create');
            Route::post('/{catalog}/categories', 'storeCategory')->name('categories.store');

        });
    });
});
