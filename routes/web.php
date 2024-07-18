<?php

use App\Http\Controllers\arsipController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/login')->group(function(){
    Route::get('/',[loginController::class,'index'])->name('login.index');
    Route::post('/check',[loginController::class,'check'])->name('login.check');
});
Route::prefix('/arsip')->middleware('admin')->group(function(){
    Route::get('/',[arsipController::class,'index'])->name('arsip.index');
});