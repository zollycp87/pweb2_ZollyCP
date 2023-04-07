<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('login.index');
});

//admin
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/kelola-pegawai', function () {
        return view('admin.kelola-pegawai');
    });
    Route::get('/kelola-user', function () {
        return view('admin.kelola-user');
    });
    Route::get('/form-pegawai', function () {
        return view('admin.form-pegawai');
    });
    Route::resource('/kelola-pegawai', PegawaiController::class);
    Route::resource('/kelola-user', UserController::class);
});

//manager
Route::prefix('manager')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('manager.dashboard');
    });
});

//petugas
Route::prefix('petugas')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('petugas.dashboard');
    });
    Route::get('/kelola-pegawai', function () {
        return view('petugas.kelola-pegawai');
    });
    Route::resource('/kelola-pegawai', PegawaiController::class);
});



//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
