<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPribadiController;
use App\Http\Controllers\DataPekerjaanController;
use App\Http\Controllers\DataPendidikanController;

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

Route::get('/User', [DataPribadiController::class, 'index'])->name('User');

Route::get('/button/{id}', [DataPribadiController::class, 'button'])->name('button');
Route::get('/tambahdatapribadi', [DataPribadiController::class, 'tambahdatapribadi'])->name('tambahdatapribadi');
Route::get('/editdatapribadi/{id}', [DataPribadiController::class, 'editdatapribadi'])->name('editdatapribadi');
Route::get('/tambahberkaspendukung/{id}', [DataPribadiController::class, 'tambahberkaspendukung'])->name('tambahberkaspendukung');
Route::post('/insertdata', [DataPribadiController::class, 'insertdata'])->name('insertdata');
Route::post('/updatedatapribadi/{id}', [DataPribadiController::class, 'updatedatapribadi'])->name('updatedatapribadi');
Route::post('/insertberkaspendukung/{id}', [DataPribadiController::class, 'insertberkaspendukung'])->name('insertberkaspendukung');

Route::get('/index', [DataPribadiController::class, 'index'])->name('index');

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

Route::get('/delete/{id}', [DataPribadiController::class, 'delete'])->name('delete');
Route::get('/output', [DataPribadiController::class, 'output'])->name('output');

