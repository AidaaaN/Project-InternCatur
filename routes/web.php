<?php

use App\Http\Controllers\arsipController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\surat_masukController;
use Illuminate\Support\Facades\Route;


Route::get('/logout',[loginController::class,'logout'])->name('logout');  


Route::prefix('/login')->group(function(){
    Route::get('/',[loginController::class,'index'])->name('login.index');
    Route::post('/check',[loginController::class,'check'])->name('login.check');
});
    Route::prefix('/dashboard')->middleware('admin')->group(function(){
    Route::get('/',[dashboardController::class ,'index'])->name('dashboard');
    Route::get('/arsip', [arsipController::class,'index'])->name('arsip.index');
    Route::get('/suratMasuk', [surat_masukController::class,'index'])->name('suratmasuk.index');
});
