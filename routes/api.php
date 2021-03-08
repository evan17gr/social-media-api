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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',

], function ($router) {


});

Route::post("users/signup", "App\Http\Controllers\Users@signup");
Route::post("users/login", "App\Http\Controllers\Users@login");

Route::post("users/email/verify", "App\Http\Controllers\EmailVerificationController@verify");
Route::post("users/email/resend", "App\Http\Controllers\EmailVerificationController@resendEmail");