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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/test', function() {
	return "{\"test\": \"asd\"}";
});

Route::get('/v1/records', 'RecordApiController@index');
Route::post('/v1/records', 'RecordApiController@store');
Route::get('/v1/records/{id}', 'RecordApiController@show');
Route::put('/v1/records/{id}', 'RecordApiController@update');
Route::delete('/v1/records/{id}', 'RecordApiController@destroy');

Route::get('/v1/user/{userId}/records', 'RecordApiController@index');
Route::get('/v1/user/{userId}/records/{recordId}', 'RecordApiController@show');
Route::post('/v1/user/{userId}/records', 'RecordApiController@store');
Route::put('/v1/user/{userId}/records/{recordId}', 'RecordApiController@update');
Route::delete('/v1/user/{userId}/records/{recordId}', 'RecordApiController@destroy');


















