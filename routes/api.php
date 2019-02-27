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

//Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
//Route::get('user/create', ['as' => 'create', 'uses' => 'UserController@create']);
//Route::post('user/create', ['as' => 'add', 'uses' => 'UserController@createRequest']);
//Route::get('user/{id}/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
//Route::post('user/{id}/edit', ['as' => 'update', 'uses' => 'UserController@update']);
//Route::get('user/{id}/delete', ['as' => 'delete', 'uses' => 'UserController@delete']);
