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
Route::post('/login', 'UserController@login');
Route::post('/logout', 'UserController@logout')->middleware('auth:sanctum');

//device
Route::get('/devices', 'DeviceController@show')->middleware('auth:sanctum');

//log
Route::get('/device-logs/{device_id}', 'LogController@show')->middleware('auth:sanctum');

//type
Route::get('/type', 'TypeController@show')->middleware('auth:sanctum');