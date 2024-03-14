<?php

use App\Http\Controllers\FormateurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermutationController;
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

// Authentication routes
Route::get('/login', [LoginController::class, 'show'])->name('login.show')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// Registration route
Route::get('/register', [FormateurController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [FormateurController::class, 'store'])->name('register.store');

//Update Formateur route
Route::put('/formateur/{formateur}/edit', [FormateurController::class, 'update'])->name('formateur.update')->middleware('auth');

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Redirect root to home for authenticated users
Route::redirect('/', '/home')->name('accueil')->middleware('auth');



// Permutation routes
Route::middleware('auth')->group(function () {
    Route::resource('permutation', PermutationController::class);
});


// Formateur routes
Route::middleware('auth')->group(function () {
    Route::resource('formateur', FormateurController::class)->except('create', 'store');
});