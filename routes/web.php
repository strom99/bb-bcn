<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [BookController::class, 'index']);

Route::prefix('books')->group(function () {
    Route::get('show/{book}', [BookController::class, 'show']);
    Route::get('create', [BookController::class, 'create']);
    Route::post('store', [BookController::class, 'store']);
    Route::get('{id}/edit', [BookController::class, 'edit']);
    Route::put('{id}/update', [BookController::class, 'update']);
    Route::delete('{id}', [BookController::class, 'destroy']);
});


Route::resource('categories', CategoryController::class);
