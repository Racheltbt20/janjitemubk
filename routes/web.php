<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\JanjiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// LOGIN LOGOUT
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTRASI
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index')->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');

// JANJI
Route::get('/', [JanjiController::class, 'index'])->name('janji.index')->middleware('auth');
Route::post('/', [JanjiController::class, 'store'])->name('janji.store');
Route::get('/daftar', [JanjiController::class, 'daftar'])->name('janji.daftar')->middleware('auth');
Route::get('/detail/{id}', [JanjiController::class, 'detail'])->name('janji.detail')->middleware('auth');
Route::delete('/daftar/{id}', [JanjiController::class, 'delete'])->name('janji.delete');

// GURU
Route::get('/guru/daftar', [GuruController::class, 'index'])->name('guru.index')->middleware('auth');
Route::get('/guru/detail/{id}', [GuruController::class, 'detail'])->name('guru.detail')->middleware('auth');
Route::put('/guru/detail/{id}', [GuruController::class, 'respon'])->name('guru.respon')->middleware('auth');