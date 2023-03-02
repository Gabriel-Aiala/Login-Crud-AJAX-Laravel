<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class,'index']);
Route::middleware('auth')->group(function () {
    Route::get('/edit/{id}', [UserController::class,'edit'])->name('edit');
    Route::put('/update', [UserController::class,'update'])->name('update');
    Route::post('/store', [UserController::class,'store'])->name('store');
    Route::get('/userForm', [UserController::class,'userForm'])->name('userForm');
    Route::get('/listUsers', [UserController::class,'listUsers'])->name('listUsers');
    Route::delete('users/{id}', [UserController::class,'destroy'])->name('deletar');
});

Route::post('/home', [UserController::class,'login'])->name('home');

