<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [MessageController::class, 'index'])->name('messages.index');

Route::get('/edit{id}', [MessageController::class, 'edit'])->name('messages.edit');

Route::get('/create', [MessageController::class, 'create'])->name('messages.create');

Route::post('/store', [MessageController::class, 'store'])->name('messages.store');

Route::put('/update{id}', [MessageController::class, 'update'])->name('messages.update');

Route::delete('/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');


