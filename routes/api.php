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

Route::group(['prefix' => 'phonebook'], function () {
    Route::post('/create', [
        'uses' => 'BookController@store',
        'as'  => 'create'
    ]);

    Route::get('/get', [
        'uses' => 'BookController@index',
        'as'  => 'get'
    ]);

    Route::get('/datatable', [
        'uses' => 'BookController@table',
        'as'  => 'table'
    ]);

    Route::post('/edit', [
        'uses' => 'BookController@update',
        'as'  => 'edit'
    ]);

    Route::post('/delete', [
        'uses' => 'BookController@destroy',
        'as'  => 'delete'
    ]);

});
