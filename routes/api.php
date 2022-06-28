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
/*

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/



Route::post('authenticate', 'Api\ApiController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout', 'Api\ApiController@logout');
    Route::post('transaction', 'Api\TransactionController@transaction');
    Route::post('get_user', 'Api\TransactionController@get_user');
});


Route::get('/welcome', function () {
    return view('welcome');
});