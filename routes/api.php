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
/*
    Route::get('tasks', 'TaskController@index');
    Route::get('tasks/{id}', 'TaskController@show');
    Route::post('tasks', 'TaskController@store');
    Route::put('tasks/{id}', 'TaskController@update');
    Route::delete('tasks/{id}', 'TaskController@destroy');*/
});


