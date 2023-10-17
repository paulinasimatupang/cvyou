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

Route::get('/button/{id}', [PenggunaController::class, 'button'])->name('button');
Route::get('/tambahdatapribadi', [PenggunaController::class, 'tambahdatapribadi'])->name('tambahdatapribadi');
Route::get('/editdatapribadi/{id}', [PenggunaController::class, 'editdatapribadi'])->name('editdatapribadi');
Route::get('/tambahdatapendidikan/{id}', [PenggunaController::class, 'tambahdatapendidikan'])->name('tambahdatapendidikan');
Route::get('/tambahdatapekerjaan/{id}', [PenggunaController::class, 'tambahdatapekerjaan'])->name('tambahdatapekerjaan');
Route::get('/tambahberkaspendukung/{id}', [PenggunaController::class, 'tambahberkaspendukung'])->name('tambahberkaspendukung');
Route::post('/insertdata', [PenggunaController::class, 'insertdata'])->name('insertdata');
Route::post('/updatedatapribadi/{id}', [PenggunaController::class, 'updatedatapribadi'])->name('updatedatapribadi');
Route::post('/insertdatapendidikan/{id}', [PenggunaController::class, 'insertdatapendidikan'])->name('insertdatapendidikan');
Route::post('/insertdatapekerjaan/{id}', [PenggunaController::class, 'insertdatapekerjaan'])->name('insertdatapekerjaan');
Route::post('/insertberkaspendukung/{id}', [PenggunaController::class, 'insertberkaspendukung'])->name('insertberkaspendukung');

Route::get('/index', [PenggunaController::class, 'index'])->name('index');

Route::post('/insertpekerjaan', [PenggunaController::class, 'insertpekerjaan'])->name('insertpekerjaan');

Route::get('/editdatapekerjaan/{id}', [PenggunaController::class, 'editdatapekerjaan'])->name('editdatapekerjaan');

Route::post('/updatepekerjaan/{id}', [PenggunaController::class, 'updatepekerjaan'])->name('updatepekerjaan');

Route::get('/delete/{id}', [PenggunaController::class, 'delete'])->name('delete');

Route::get('/output', [PenggunaController::class, 'output'])->name('output');

