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

Route::post('login', 'AuthJWT\LoginController@login');
Route::post('register', 'AuthJWT\RegisterController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', 'AuthJWT\LoginController@logout');

    Route::get('notes', 'API\NoteController@index');
    Route::get('notes/{id}', 'API\NoteController@show');
    Route::post('notes', 'API\NoteController@store');
    Route::put('notes/{id}', 'API\NoteController@update');
    Route::delete('notes/{id}', 'API\NoteController@destroy');
});


