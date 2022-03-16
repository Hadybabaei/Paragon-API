<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::prefix('user')->group(function () {
        Route::post('/register',[\App\Http\Controllers\AuthController::class,'register'])->name('register');
        Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
        Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
    });
?>