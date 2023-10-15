<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormControllers;

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

Route::get('/datapekerjaan', [FormControllers::class, 'index'])->name('datapekerjaan');

Route::get('/tambahpekerjaan', [FormControllers::class, 'tambahpekerjaan'])->name('tambahpekerjaan');

Route::post('/insertdata', [FormControllers::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [FormControllers::class, 'tampilkandata'])->name('tampilkandata');

Route::post('/updatedata/{id}', [FormControllers::class, 'updatedata'])->name('updatedata');

Route::get('/deletedata/{id}', [FormControllers::class, 'deletedata'])->name('deletedata');

Route::get('/output', function () {
    return view('output');
});