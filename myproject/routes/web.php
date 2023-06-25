<?php
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CatalogController;
use Illuminate\Support\Facades\Http;

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

Route::view('/', 'index')->name('index');
Route::view('/catalog', 'catalog')->name('catalog');
Route::view('/cabinet', 'cabinet')->middleware('auth')->name('cabinet');
/*
$promise = Http::async()->get('/registration')->then(

);*/

Route::get('/registration', [RegisterController::class, 'create'])->middleware('guest')->name('registration');
Route::post('/registration', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('catalog', 'CatalogController@allData')->name('catalog');

Route::get('catalog', [CatalogController::class, 'catalog']);
