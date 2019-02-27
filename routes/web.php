<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'UserController@index')->name('index');
Route::get('user/{id}/delete', 'UserController@delete')->name('delete');
Route::get('user/create', 'UserController@create')->name('create');
Route::post('user/create', 'UserController@createRequest')->name('add');
Route::get('user/{id}/edit', 'UserController@edit')->name('edit');
Route::post('user/{id}/edit', 'UserController@update')->name('update');
