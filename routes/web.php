<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',[TestController::class,'testORM']);


Route::get('/login',[AuthController::class,'loginIndex']);
Route::post('/login/post',[AuthController::class,'loginPost']);
Route::get('/register',[AuthController::class,'registerIndex']);
Route::post('/register/send-otp',[AuthController::class,'registerSendOtp']);
Route::post('/register/post',[AuthController::class,'registerPost']);
Route::get('/logout',[AuthController::class,'logout']);

Route::get('/forget-password',[AuthController::class,'forgetPasswordEmailIndex']);
Route::post('/forget-password',[AuthController::class,'forgetPasswordSendToken']);

Route::get('/reset-password',[AuthController::class,'resetPasswordIndex']);
Route::post('/reset-password',[AuthController::class,'resetPassword']);

Route::group(['prefix'=>'admin','middleware'=>'loginCheck'],function(){
    Route::get('/index',[AdminController::class,'index']);
});
