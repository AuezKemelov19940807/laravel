<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;


Route::controller(CategoryController::class)->group(function () {
    Route::prefix('category')->group(function () {
        Route::name('category.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
//            Route::get('/{slug}', 'show')->name('show');

//            Route::delete('/{id}', 'destroy')->name('destroy');
//            Route::get('/{id}/edit', 'edit')->name('edit');
//            Route::put('/{id}', 'update')->name('update');
        });
    });
});


