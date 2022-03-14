<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Auth;

Route::prefix('articles')->middleware('auth:sanctum')->group(function(){
        Route::post('/store',[\App\Http\Controllers\ArticlesController::class,'store'])->name('article-store');
        Route::post('/update/{id}',[\App\Http\Controllers\ArticlesController::class,'update'])->name('article-update');
        Route::post('/delete/{id}',[\App\Http\Controllers\ArticlesController::class,'destroy'])->name('article-delete');
    });
?>