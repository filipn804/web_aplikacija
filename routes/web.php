<?php

use App\Http\Controllers\KnjigeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\isAdmin;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/users', UsersController::class)->middleware(isAdmin::class);
    Route::get('knjige', [KnjigeController::class, 'index'])->name('knjige.index');
    Route::get('knjige/create', [KnjigeController::class, 'create'])->name('knjige.create');
    Route::post('knjige', [KnjigeController::class, 'store'])->name('knjige.store');
    Route::get('knjige/{knjige}/edit', [KnjigeController::class, 'edit'])->name('knjige.edit');
    Route::delete('knjige/{knjige}/destroy', [KnjigeController::class, 'destroy'])->name('knjige.destroy');
    Route::put('knjige/{knjige}/update', [KnjigeController::class, 'update'])->name('knjige.update');
    Route::get('auth/home', [App\Http\Controllers\Controller::class, 'index'])->name('auth.home');
    Route::get('user/home', [App\Http\Controllers\Controller::class, 'index'])->name('user.home');
   
});

require __DIR__.'/auth.php';
