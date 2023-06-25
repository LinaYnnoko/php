<?php

use Illuminate\Support\Facades\Route;

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


Route::GET('/reg', 'RegController@index');
Route::GET('/auth', 'AuthController@index');
Route::GET('/main', 'MainController@index');
Route::GET('/main/add', 'MainController@add');
Route::GET('/main/show', 'MainController@show');
