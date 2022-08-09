<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});

Route::get('/dashboard', [TaskController::class, 'show'])->middleware(['auth'])->name('dashboard');
Route::post('/store', [TaskController::class, 'store'])->middleware(['auth'])->name('store');
Route::post('/delete/{id}', [TaskController::class, 'delete'])->middleware(['auth'])->name('delete');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->middleware(['auth'])->name('edit'); // 追記
Route::post('/update/{id}', [TaskController::class, 'update'])->middleware(['auth'])->name('update'); // 追記

require __DIR__.'/auth.php';
