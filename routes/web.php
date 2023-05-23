<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::delete('products/{product}', [ProductController::class, 'destroy'])
            ->name('products.destroy');

        Route::patch('products/{product}', [ProductController::class, 'update'])
            ->name('products.update');

        Route::get('products/{product}/edit', [ProductController::class, 'edit'])
            ->name('products.edit');

        Route::post('products', [ProductController::class, 'store'])
            ->name('products.store');

        Route::get('products/create', [ProductController::class, 'create'])
            ->name('products.create');

        Route::get('products', [ProductController::class, 'index'])
            ->name('products.index');

        Route::get('products/{product}', [ProductController::class, 'show'])
            ->name('products.show');
    });
