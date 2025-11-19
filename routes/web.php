<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function(){
    Route::get('/',[AuthController::class, 'login'])->name('login');
    Route::get('/registro',[AuthController::class, 'registro'])->name('registro');
    Route::post('/registrar',[AuthController::class,'registrar'])->name('registrar');
    Route::post('/logear',[AuthController::class,'logear'])->name('logear');
});

Route::middleware("auth")->group(function(){
   Route::get('/home',[AuthController::class,'home'])->name('home');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/usuarios', [AuthController::class, 'usuarios'])->name('usuarios');
    Route::patch('/usuarios/{id}/estado', [AuthController::class, 'cambiarEstado'])->name('usuarios.cambiarEstado');
    Route::get('/create',[AuthController::class,'create'])->name('create');
    Route::post('/store',[AuthController::class,'store'])->name('store');
    Route::get('/show/{id}',[AuthController::class,'show'])->name('show');
    Route::get('/edit/{id}',[AuthController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[AuthController::class,'update'])->name('update');
    Route::delete('/destroy/{id}',[AuthController::class,'destroy'])->name('destroy');

});

