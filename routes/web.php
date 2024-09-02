<?php

use App\Http\Controllers\arsipController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\surat_keluarController;
use App\Http\Controllers\surat_masukController;
use Illuminate\Support\Facades\Route;

Route::get('/templatesurat', function (){
    return view(('templatesurat.index'));
});

Route::get('/logout',[loginController::class,'logout'])->name('logout');  


Route::prefix('/login')->group(function(){
    Route::get('/',[loginController::class,'index'])->name('login.index');
    Route::post('/check',[loginController::class,'check'])->name('login.check');
});
    Route::prefix('/dashboard')->middleware('admin')->group(function(){
    Route::get('/',[dashboardController::class ,'index'])->name('dashboard');
});

Route::prefix('/arsip')->middleware('admin')->group(function(){
    Route::get('/', [arsipController::class,'index'])->name('arsip.index');
    
});
Route::prefix('/suratMasuk')->middleware('admin')->group(function(){
    Route::get('/', [surat_masukController::class,'index'])->name('suratmasuk.index');

});
Route::prefix('/suratKeluar')->middleware('admin')->group(function(){
    Route::get('/', [surat_keluarController::class,'index'])->name('suratkeluar.index');

});