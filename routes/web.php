<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/tambahdatapribadi', [PenggunaController::class, 'tambahdatapribadi'])->name('tambahdatapribadi');
Route::get('/tambahberkaspendukung', [PenggunaController::class, 'tambahberkaspendukung'])->name('tambahberkaspendukung');

Route::post('/insertdata', [PenggunaController::class, 'insertdata'])->name('insertdata');

//mutia
Route::get('/tabel1', [FormControllers::class, 'index'])->name('tabel1');

Route::get('/tambahdatapekerjaan', [FormControllers::class, 'tambahdatapekerjaan'])->name('tambahdatapekerjaan');

Route::post('/insertpekerjaan', [FormControllers::class, 'insertpekerjaan'])->name('insertpekerjaan');

Route::get('/editdatapekerjaan/{id}', [FormControllers::class, 'editdatapekerjaan'])->name('editdatapekerjaan');

Route::post('/updatepekerjaan/{id}', [FormControllers::class, 'updatepekerjaan'])->name('updatepekerjaan');

Route::get('/deletepekerjaan/{id}', [FormControllers::class, 'deletepekerjaan'])->name('deletepekerjaan');

Route::get('/output', function () {
    return view('output');
});