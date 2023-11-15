<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DataSkillController;
use App\Http\Controllers\DataPribadiController;
use App\Http\Controllers\DataPekerjaanController;
use App\Http\Controllers\DataPendidikanController;
use App\Http\Controllers\BerkasPendukungController;


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

//Login
Route::get('/login', [PenggunaController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PenggunaController::class, 'login']);
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

//register
Route::get('/register', [PenggunaController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [PenggunaController::class, 'register']);

//Data Pribadi
Route::get('/User', [DataPribadiController::class, 'index'])->name('User');
Route::get('/button/{id}', [DataPribadiController::class, 'button'])->name('button');
Route::get('/tambahdatapribadi', [DataPribadiController::class, 'tambahdatapribadi'])->name('tambahdatapribadi');
Route::get('/editdatapribadi/{id}', [DataPribadiController::class, 'editdatapribadi'])->name('editdatapribadi');
Route::post('/insertdata', [DataPribadiController::class, 'insertdata'])->name('insertdata');
Route::post('/updatedatapribadi/{id}', [DataPribadiController::class, 'updatedatapribadi'])->name('updatedatapribadi');
Route::get('/index', [DataPribadiController::class, 'index'])->name('index');
Route::get('/delete/{id}', [DataPribadiController::class, 'delete'])->name('delete');
Route::get('/output', [DataPribadiController::class, 'output'])->name('output');

//pendidikan
Route::get('/tambahdatapendidikan', [DataPendidikanController::class, 'tambahdatapendidikan'])->name('tambahdatapendidikan');
Route::post('/insertdatapendidikan', [DataPendidikanController::class, 'insertdatapendidikan'])->name('insertdatapendidikan');
Route::get('/editdatapendidikan/{id}', [DataPendidikanController::class, 'editdatapendidikan'])->name('editdatapendidikan');
Route::post('/updatependidikan/{id}', [DataPendidikanController::class, 'updatependidikan'])->name('updatependidikan');
Route::get('/deletependidikan/{id}', [DataPendidikanController::class, 'deletependidikan'])->name('deletependidikan');

//pekerjaan
Route::get('/tambahdatapekerjaan', [DataPekerjaanController::class, 'tambahdatapekerjaan'])->name('tambahdatapekerjaan');
Route::post('/insertdatapekerjaan', [DataPekerjaanController::class, 'insertpekerjaan'])->name('insertpekerjaan');
Route::get('/editdatapekerjaan/{id}', [DataPekerjaanController::class, 'editdatapekerjaan'])->name('editdatapekerjaan');
Route::post('/updatepekerjaan/{id}', [DataPekerjaanController::class, 'updatepekerjaan'])->name('updatepekerjaan');
Route::get('/deletepekerjaan/{id}', [DataPekerjaanController::class, 'deletepekerjaan'])->name('deletepekerjaan');

//Skill
Route::get('/tambahdataskill', [DataSkillController::class, 'tambahdataskill'])->name('tambahdataskill');
Route::post('/insertdataskill', [DataSkillController::class, 'insertskill'])->name('insertskill');
Route::get('/editdataskill/{id}', [DataSkillController::class, 'editdataskill'])->name('editdataskill');
Route::post('/updateskill/{id}', [DataSkillController::class, 'updateskill'])->name('updateskill');
Route::get('/deleteskill/{id}', [DataSkillController::class, 'deleteskill'])->name('deleteskill');

//Berkas Pendukung
Route::get('/tambahberkaspendukung', [BerkasPendukungController::class, 'tambahberkaspendukung'])->name('tambahberkaspendukung');
Route::post('/insertberkaspendukung', [BerkasPendukungController::class, 'insertberkaspendukung'])->name('insertberkaspendukung');
Route::get('/deleteberkaspendukung/{berkasId}', [BerkasPendukungController::class, 'deleteberkaspendukung'])->name('deleteberkaspendukung');

Route::get('/output', function () {
    return view('output');
});