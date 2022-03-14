<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/v1/user/register',[\App\Http\Controllers\AuthController::class,'register'])->name('register');
Route::post('/v1/user/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/v1/user/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');

Route::get('/v1/articles',[\App\Http\Controllers\ArticlesController::class,'show'])->name('get_articles');
Route::middleware('auth:sanctum')->post('/v1/articles/store',[\App\Http\Controllers\ArticlesController::class,'store'])->name('article-store');
Route::middleware('auth:sanctum')->post('/v1/articles/update/{id}',[\App\Http\Controllers\ArticlesController::class,'update'])->name('article-update');
Route::middleware('auth:sanctum')->post('/v1/articles/delete/{id}',[\App\Http\Controllers\ArticlesController::class,'destroy'])->name('article-delete');





