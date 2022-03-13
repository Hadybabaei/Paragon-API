<?php

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
Route::get('/v1',[\App\Http\Controllers\AuthController::class,'index'])->name('api');
Route::post('/v1/user/register',[\App\Http\Controllers\AuthController::class,'register'])->name('register');
Route::post('/v1/user/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/v1/user/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');




