<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\CardController;
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

Route::prefix('card')->group(function () {
    Route::get('/', 'App\Http\Controllers\CardController@index');
    Route::get('/fetch', 'App\Http\Controllers\CardController@fetch');
    Route::post('/ins', 'App\Http\Controllers\CardController@ins');
    Route::put('/upd/{id}', 'App\Http\Controllers\CardController@upd');
    Route::delete('/del/{id}', 'App\Http\Controllers\CardController@del');
});

Route::prefix('column')->group(function () {
    Route::get('/', 'App\Http\Controllers\ColumnController@index');
    Route::get('/fetch', 'App\Http\Controllers\ColumnController@fetch');
    Route::post('/ins', 'App\Http\Controllers\ColumnController@ins');
    Route::put('/upd/{id}', 'App\Http\Controllers\ColumnController@upd');
    Route::delete('/del/{id}', 'App\Http\Controllers\ColumnController@del');
});
