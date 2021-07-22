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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user
Route::post('/add', 'UserController@add');
Route::post('/login', 'UserController@login');
Route::get('/user', 'UserController@index')->middleware('auth:sanctum');
Route::post('/logout', 'UserController@logout')->middleware('auth:sanctum');

//device
Route::get('/devices/{device_id}', 'DeviceController@show')->middleware('auth:sanctum');
Route::get('/devices', 'DeviceController@index')->middleware('auth:sanctum');
Route::get('/device/categories', 'CategoryController@device')->middleware('auth:sanctum');
Route::post('/devices/{device_id}', 'DeviceController@del')->middleware('auth:sanctum');
Route::post('/devices', 'DeviceController@create')->middleware('auth:sanctum');

//log
Route::get('/logs/{device_id}', 'LogController@show')->middleware('auth:sanctum');
Route::get('/state', 'LogController@state')->middleware('auth:sanctum');
Route::post('/logs', 'LogController@log');

//category
Route::get('/categories', 'CategoryController@show')->middleware('auth:sanctum');
Route::post('/categories', 'CategoryController@create')->middleware('auth:sanctum');
Route::get('/categories/{device_id}', 'CategoryController@only')->middleware('auth:sanctum');
Route::post('/categories/{device_id}', 'CategoryController@add')->middleware('auth:sanctum');