<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DataPendidikanController;
use App\Http\Controllers\DataPekerjaanController;

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

Route::get('/button/{id}', [PenggunaController::class, 'button'])->name('button');
Route::get('/tambahdatapribadi', [PenggunaController::class, 'tambahdatapribadi'])->name('tambahdatapribadi');
Route::get('/editdatapribadi/{id}', [PenggunaController::class, 'editdatapribadi'])->name('editdatapribadi');
Route::get('/tambahberkaspendukung/{id}', [PenggunaController::class, 'tambahberkaspendukung'])->name('tambahberkaspendukung');
Route::post('/insertdata', [PenggunaController::class, 'insertdata'])->name('insertdata');
Route::post('/updatedatapribadi/{id}', [PenggunaController::class, 'updatedatapribadi'])->name('updatedatapribadi');
Route::post('/insertberkaspendukung/{id}', [PenggunaController::class, 'insertberkaspendukung'])->name('insertberkaspendukung');

Route::get('/index', [PenggunaController::class, 'index'])->name('index');

//pendidikan
Route::get('/tambahdatapendidikan', [DataPendidikanController::class, 'tambahdatapendidikan'])->name('tambahdatapendidikan');
Route::post('/insertdatapendidikan/{id}', [DataPendidikanController::class, 'insertpendidikan'])->name('insertpendidikan');

//pekerjaan
Route::get('/tambahdatapekerjaan', [DataPekerjaanController::class, 'tambahdatapekerjaan'])->name('tambahdatapekerjaan');
Route::post('/insertdatapekerjaan', [DataPekerjaanController::class, 'insertpekerjaan'])->name('insertpekerjaan');
Route::get('/editdatapekerjaan/{id}', [DataPekerjaanController::class, 'editdatapekerjaan'])->name('editdatapekerjaan');
Route::post('/updatepekerjaan/{id}', [DataPekerjaanController::class, 'updatepekerjaan'])->name('updatepekerjaan');
Route::get('/deletepekerjaan/{id}', [DataPekerjaanController::class, 'deletepekerjaan'])->name('deletepekerjaan');

Route::get('/output', function () {
    return view('output');
});

Route::get('/delete/{id}', [PenggunaController::class, 'delete'])->name('delete');
Route::get('/output', [PenggunaController::class, 'output'])->name('output');

