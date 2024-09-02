<?php

use App\Http\Controllers\arsipController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\surat_keluarController;
use App\Http\Controllers\surat_masukController;
use Illuminate\Support\Facades\Route;


Route::get('/logout', [loginController::class, 'logout'])->name('logout');


Route::prefix('/login')->group(function () {
    Route::get('/', [loginController::class, 'index'])->name('login.index');
    Route::post('/check', [loginController::class, 'check'])->name('login.check');
    //Route::post('/forgot-password', [loginController::class, 'forgotPassword'])->name('forgot.password');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
   
});
Route::prefix('/dashboard')->middleware('admin')->group(function () {
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('/arsip')->middleware('admin')->group(function () {
    Route::get('/', [arsipController::class, 'index'])->name('arsip.index');
    Route::get('/data', [arsipController::class, 'dataArsip'])->name('arsip.data');
});
Route::prefix('/suratMasuk')->middleware('admin')->group(function () {
    Route::get('/', [surat_masukController::class, 'index'])->name('suratmasuk.index');
    Route::get('/data', [surat_masukController::class, 'dataSuratMsk'])->name('suratmasuk.data');
    Route::get('/tambah', [surat_masukController::class, 'tambah'])->name('suratmasuk.tambah');
});
Route::prefix('/suratKeluar')->middleware('admin')->group(function () {
    Route::get('/', [surat_keluarController::class, 'index'])->name('suratkeluar.index');
    Route::get('/data', [surat_keluarController::class, 'dataSuratKeluar'])->name('suratkeluar.data');
});




