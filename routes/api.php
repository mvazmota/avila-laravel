<?php

use Illuminate\Http\Request;

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

Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@showUser');
Route::get('users/{user}/badges', 'UserController@getBadges');

Route::post('user', 'UserController@updateUser');
Route::get('user', 'UserController@authUser');

Route::post('qrcode', 'QrCodeController@generateCode');
Route::post('users/{user}/scan', 'QrCodeController@scanCode');

