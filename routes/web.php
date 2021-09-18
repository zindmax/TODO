<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/todos', [\App\Http\Controllers\ItemController::class, 'index']);
Route::post('/todos', [\App\Http\Controllers\ItemController::class, 'store'])->name('storeTodo');
Route::post('/todos/item/{id}/complete', [\App\Http\Controllers\ItemController::class, 'complete'])->name('completeTodo');
Route::delete('/todos/item/{id}/delete', [\App\Http\Controllers\ItemController::class, 'delete'])->name('deleteTodo');

Route::get('/dashboard', function () {
    return view('todos');
})->middleware(['auth'])->name('todos');

require __DIR__.'/auth.php';
