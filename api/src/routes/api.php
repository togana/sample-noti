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

Route::post('/users', 'UserController@store')->name('users.store');
Route::post('/users/login', 'UserController@login')->name('users.login');

Route::middleware('auth:sanctum')->get('/users', 'UserController@show')->name('users.show');
Route::middleware('auth:sanctum')->post('/push-notification/token', 'PushNotificationTokenController@store')->name('push-notification.token.show');
