<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;

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

Route::get('/User', [PenggunaController::class, 'index'])->name('User');

Route::get('/tambahdatapribadi', [PenggunaController::class, 'tambahdatapribadi'])->name('tambahdatapribadi')->middleware('auth');
Route::get('/tambahdatapendidikan',[PenggunaController::class,'tambahdatapendidikan'])-> name('tambahdatapendidikan');

Route::post('/insertdata', [PenggunaController::class, 'insertdata'])->name('insertdata');

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');