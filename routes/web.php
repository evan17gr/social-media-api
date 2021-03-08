<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post("users/signup", "App\Http\Controllers\Users@signup");
Route::post("users/login", "App\Http\Controllers\Users@login");

Route::post("users/email/verify", "App\Http\Controllers\EmailVerificationController@verify");
Route::post("users/email/resend", "App\Http\Controllers\EmailVerificationController@resendEmail");

