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
 * get item info by id
 */
Route::get('/item/{id}', 'Api\ItemController@getItemInfo');

/**
 * get item list
 */
Route::get('/itemlist', 'Api\ItemController@getItemList');

/**
 * get item reecommend list
 */
Route::get('/itemrecommendlist', 'Api\ItemController@getRecommendList');

/**
 * get item category list
 */
Route::get('/itemcategorylist', 'Api\ItemCategoryController@getItemCategoryList');