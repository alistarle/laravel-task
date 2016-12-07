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

Route::get('/', 'TodoController@index');
Route::get('/{todo}', 'TodoController@show');
Route::delete('task/{task}', 'TaskController@delete');


Route::post('todo', 'TodoController@store');
Route::delete('todo/{todo}', 'TodoController@delete');
Route::post('todo/{todo}/task', 'TaskController@store');


Route::group(['prefix' => 'api'], function () {
    Route::get('todos', 'TodoController@index');
    Route::get('users', 'UserController@index');
    Route::get('user/{user}/tasks', 'UserController@tasks');

    Route::group(['prefix' => 'task'], function () {
        Route::delete('{task}', 'TaskController@delete');
        Route::patch('{task}', 'TaskController@update');
    });

    Route::group(['prefix' => 'todo'], function () {
        Route::post('/', 'TodoController@store');
        Route::get('{todo}', 'TodoController@show');
        Route::delete('{todo}', 'TodoController@delete');
        Route::post('{todo}/task', 'TaskController@store');
    });
});