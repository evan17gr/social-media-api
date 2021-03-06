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

Route::view('/{path?}', 'app');
Route::post("users/signup", "App\Http\Controllers\Users@signup");
Route::post("users/email/verify/{id}", "App\Http\Controllers\EmailVerificationController@verify");
Route::get("users/email/resend", "App\Http\Controllers\EmailVerificationController@resend");

