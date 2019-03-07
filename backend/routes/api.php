<?php

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

Route::get('v1/players', 'PlayerController@index');
Route::get('v1/players/{id}', 'PlayerController@show');
Route::post('v1/players', 'PlayerController@store');
Route::post('v1/players/{id}/answers', 'PlayerController@answer');
Route::delete('v1/players/{id}', 'PlayerController@delete');
Route::delete('v1/players/{id}/answers', 'PlayerController@resetAnswers');
