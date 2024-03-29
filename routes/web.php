<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;

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
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['Admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');
    //Location
    Route::resource('admin/location', KontakController::class);
    Route::post('/admin/location/cari/hasil', [KontakController::class, 'cari'])->name('cariLokasi');
    //About Us
    Route::resource('admin/aboutUs', AboutUsController::class);
});

Route::middleware(['Super Admin'])->group(function () {
    Route::get('/superAdmin/home', [HomeController::class, 'superAdminHome'])->name('superAdminHome');
});

Route::middleware(['Karyawan'])->group(function () {
    Route::get('/karyawan/home', [HomeController::class, 'karyawanHome'])->name('karyawanHome');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});




