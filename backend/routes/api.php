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
/**
 * get Item info by Id
 */
Route::get('/item/{id}', 'Api\ItemController@getItemInfo');

/**
 * get Item list
 */
Route::get('/itemlist', 'Api\ItemController@getItemList');
