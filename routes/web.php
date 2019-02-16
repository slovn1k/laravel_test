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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/home', 'UserController', ['except' => ['show']]);
    Route::post('/home/datatable', 'UserController@datatable');

    Route::post('/edit_user/{id}', 'RegisterUserController@edit')->name('edit_user');

    Route::post('/register_user', 'RegisterUserController@register_user')->name('register_user');
    Route::post('/update_user', 'RegisterUserController@update_user')->name('update_user');

    Route::post('/change_status/{id}', 'RegisterUserController@change_status')->name('change_status');

    Route::get('/groups', 'GroupController@index');
    Route::post('/groups/create_group', 'GroupController@create_group')->name('create_group');
    Route::post('/groups/store_group', 'GroupController@store_group')->name('store_group');
    Route::post('/groups/update_groups', 'GroupController@update_groups')->name('update_group');
    Route::post('/groups/delete_group/{id}', 'GroupController@delete_group')->name('delete_group');
});
