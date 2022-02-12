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

//destination routes
Route::get('/destinations/{koordinat}','DestinationController@neardestination');
Route::get('/destinationnear/{koordinat}','DestinationController@nearme');
Route::get('/destination/all','DestinationController@alldestination');
Route::get('/destination/{name}', 'DestinationController@dest_search');
Route::get('/destination/detail/{slug}', 'DestinationController@dest_detail');

//article routes
Route::get('/article/latest/', 'ArticleController@latest_article');
Route::get('/articles', 'ArticleController@article_list');
Route::get('/article/detail/{slug}', 'ArticleController@full_article');
Route::post('/article','ArticleController@addArticle')->middleware('jwt.verify');
Route::put('/article/{id}','ArticleController@updateArticle')->middleware('jwt.verify');
Route::get('/article/{id}','ArticleController@deleteArticle')->middleware('jwt.verify');

//Promo
Route::get('/promos', 'PromoController@promo_list');
Route::get('/promo/detail/{slug}', 'PromoController@detailPromo');
Route::post('/promo','PromoController@addPromo')->middleware('jwt.verify');
Route::put('/promo/{id}','PromoController@updatePromo')->middleware('jwt.verify');
Route::get('/promo/{id}','PromoController@deletePromo')->middleware('jwt.verify');