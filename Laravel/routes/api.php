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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('record', 'Auth\RegisterController@record');
Route::post('enter', 'Auth\LoginController@enter');
Route::post('exit', 'Auth\LoginController@exit');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('photos', 'PhotoController@index');
    Route::get('photos/{photo}', 'PhotoController@show');
    Route::post('photos', 'PhotoController@store');
    Route::put('photos/{photo}', 'PhotoController@update');
    Route::delete('photos/{photo}', 'PhotoController@delete');
});