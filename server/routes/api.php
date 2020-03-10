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


Route::middleware('cors')->group(function() {
Route::get('/','MovieController@getAll');
Route::post('/','MovieController@post');
Route::delete('/{id}','MovieController@delete');
Route::put('/{id}','MovieController@update');
Route::get('/{id}','MovieController@getOne');
});
