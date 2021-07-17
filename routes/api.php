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
Route::post('getriwayatpresensi', 'Api\ApiController@getriwayatpresensi');
Route::post('getrekappresensi', 'Api\ApiController@getrekappresensi');
Route::post('getdetailgaji', 'Api\ApiController@getdetailgaji');
Route::post('getgaji', 'Api\ApiController@getgaji');
Route::post('updatetoken', 'Api\ApiController@updatetoken');
Route::get('cronjob/notifsatumenit', 'Api\ApiController@notifsatumenit');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
