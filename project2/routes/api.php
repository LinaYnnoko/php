<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::GET('/reg/verify', 'Ajax\AjaxRegController@Verify');
Route::POST('/auth/verify', 'Ajax\AjaxAuthController@Verify');
Route::POST("/animal/verify", 'Ajax\AddAnimalController@Verify');
Route::POST("/animal/filter", 'Ajax\AjaxAnimalController@Filter');
Route::POST("/animal/addFavorites", 'Ajax\AjaxAnimalController@AddFavorites');
Route::Post("/animal/delete", 'Ajax\AjaxAnimalController@Delete');
Route::Post("/animal/getInfo", 'Ajax\AjaxAnimalController@Info');
