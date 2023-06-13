<?php

use App\Http\Controllers\TodoController;
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
Route::middleware('auth')->group(function () {
    Route::get('', [TodoController::class, 'index'])->name('todo.index');
    Route::get('{todo}', [TodoController::class, 'show'])->name('todo.show')->whereNumber('todo');
    Route::post('', [TodoController::class, 'store'])->name('todo.store');
    Route::put('{todo}', [TodoController::class, 'update'])->name('todo.update')->whereNumber('todo');
    Route::delete('{todo}', [TodoController::class, 'destroy'])->name('todo.destroy')->whereNumber('todo');
    Route::get('search', [TodoController::class, 'search'])->name('todo.search');
});

Auth::routes();
