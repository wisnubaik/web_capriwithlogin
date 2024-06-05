<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute untuk menangani pengiriman login
Route::post('/serve', [ProfilController::class, 'login'])->name('serve');

// Rute untuk menangani reminder form submission
Route::post('/home', [ProfilController::class, 'pengingat'])->name('home');

// Rute untuk menampilkan halaman login
Route::get('/', function () {
    return view('halaman_login');
})->name('login');

// Menampilkan beranda
Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');


// halaman menu
Route::get('/menu', function () {
    return view('menu');
})->name('menu');

// halaman menu
Route::get('/menu', function () {
    return view('menu');
})->name('menu');

// halaman catatan
Route::get('/halaman_catatan', function () {
    return view('halaman_catatan');
})->name('halaman_catatan');

// edit catatan tersimpan
Route::get('/edit_catatan_tersimpan', function () {
    return view('edit_catatan_tersimpan');
})->name('edit_catatan_tersimpan');

// halaman pengingat
Route::get('/halaman_pengingat', function () {
    return view('halaman_pengingat');
})->name('halaman_pengingat');

// proses login
Route::post('/proses', [LoginController::class, 'proses'])->name('login.proses');

// halaman registrasi
Route::get('/register', function () {
    return view('register');
})->name('register');

// proses registrasi
Route::post('/register', [RegistrationController::class, 'register'])->name('register.process');
