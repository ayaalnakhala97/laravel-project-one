<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




//login
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);
//register
Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
//change_password
Route::post('/change_password',[\App\Http\Controllers\UserController::class,'change_password']);
//update_profile
Route::post('/update_profile',[\App\Http\Controllers\UserController::class,'update_profile']);
//profile
Route::get('/profile',[\App\Http\Controllers\UserController::class,'profile']);
//home
Route::get('/home',[\App\Http\Controllers\HomeController::class,'index']);
//flowers
Route::get('/flowers/{id}',[\App\Http\Controllers\HomeController::class,'flower']);
//description
Route::get('/description/{id}',[\App\Http\Controllers\HomeController::class,'description']);
//delete
Route::delete('/delete/{id}',[\App\Http\Controllers\HomeController::class,'delete']);
//fav










//all
//Route::get('/all',[\App\Http\Controllers\HomeController::class,'index']);

//trees
//Route::get('/trees',[\App\Http\Controllers\HomeController::class,'trees']);
//sprout
//Route::get('/sprout',[\App\Http\Controllers\HomeController::class,'sprout']);
//plant
//Route::get('/plant',[\App\Http\Controllers\HomeController::class,'plant']);
//seed
//Route::get('/seed',[\App\Http\Controllers\HomeController::class,'seed']);


;
