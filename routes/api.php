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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::post('/user', 'UserController@user');
//Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::get('/destinations/{koordinat}','DestinationController@neardestination');
Route::get('/destinationnear/{koordinat}','DestinationController@nearme');
Route::get('/destination/all','DestinationController@alldestination');
Route::get('/destination/{name}', 'DestinationController@dest_search');
Route::get('/destination/detail/{slug}', 'DestinationController@dest_detail');