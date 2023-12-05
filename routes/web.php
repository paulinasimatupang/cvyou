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

Route::middleware(['user'])->group(function () {
    //register
    Route::get('/register', [PenggunaController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [PenggunaController::class, 'register']);

    //Login
    Route::get('/login', [PenggunaController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [PenggunaController::class, 'login']);
    Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

    //Data Pribadi
    Route::get('/tambahdatapribadi', [PenggunaController::class, 'tambahdatapribadi'])->name('tambahdatapribadi');
    Route::get('/editdatapribadi/{id}', [PenggunaController::class, 'editdatapribadi'])->name('editdatapribadi');
    Route::post('/insertdata', [PenggunaController::class, 'insertdata'])->name('insertdata');
    Route::post('/updatedatapribadi/{id}', [PenggunaController::class, 'updatedatapribadi'])->name('updatedatapribadi');

    //pendidikan
    Route::get('/tambahdatapendidikan', [PenggunaController::class, 'tambahdatapendidikan'])->name('tambahdatapendidikan');
    Route::post('/insertdatapendidikan', [PenggunaController::class, 'insertdatapendidikan'])->name('insertdatapendidikan');
    Route::get('/editdatapendidikan/{id}', [PenggunaController::class, 'editdatapendidikan'])->name('editdatapendidikan');
    Route::post('/updatedatapendidikan/{id}', [PenggunaController::class, 'updatedatapendidikan'])->name('updatedatapendidikan');
    Route::get('/deletependidikan/{id}', [PenggunaController::class, 'deletependidikan'])->name('deletependidikan');

    //pekerjaan
    Route::get('/tambahdatapekerjaan', [PenggunaController::class, 'tambahdatapekerjaan'])->name('tambahdatapekerjaan');
    Route::post('/insertdatapekerjaan', [PenggunaController::class, 'insertpekerjaan'])->name('insertpekerjaan');
    Route::get('/editdatapekerjaan/{id}', [PenggunaController::class, 'editdatapekerjaan'])->name('editdatapekerjaan');
    Route::post('/updatedatapekerjaan/{id}', [PenggunaController::class, 'updatedatapekerjaan'])->name('updatedatapekerjaan');
    Route::get('/deletepekerjaan/{id}', [PenggunaController::class, 'deletepekerjaan'])->name('deletepekerjaan');

    //Skill
    Route::get('/tambahdataskill', [PenggunaController::class, 'tambahdataskill'])->name('tambahdataskill');
    Route::post('/insertdataskill', [PenggunaController::class, 'insertskill'])->name('insertskill');
    Route::get('/editdataskill/{id}', [PenggunaController::class, 'editdataskill'])->name('editdataskill');
    Route::post('/updatedataskill/{id}', [PenggunaController::class, 'updatedataskill'])->name('updatedataskill');
    Route::get('/deleteskill/{id}', [PenggunaController::class, 'deleteskill'])->name('deleteskill');

    //Berkas Pendukung
    Route::get('/tambahberkaspendukung', [PenggunaController::class, 'tambahberkaspendukung'])->name('tambahberkaspendukung');
    Route::post('/insertberkaspendukung', [PenggunaController::class, 'insertberkaspendukung'])->name('insertberkaspendukung');
    Route::get('/editberkaspendukung/{id}', [PenggunaController::class, 'editberkaspendukung'])->name('editberkaspendukung');
    Route::post('/updateberkaspendukung/{id}', [PenggunaController::class, 'updateberkaspendukung'])->name('updateberkaspendukung');
    Route::get('/deleteberkaspendukung/{berkasId}', [PenggunaController::class, 'deleteberkaspendukung'])->name('deleteberkaspendukung');

    Route::get('/lihatcv', [PenggunaController::class, 'lihatcv'])->name('lihatcv');
});