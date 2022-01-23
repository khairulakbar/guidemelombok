<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    //return view('welcome');
    return redirect('/admin/destinasi');
});


//Route::get('/home', 'AdminController@desty')->name('home');
//Route::get('/admin/login', 'AdminController@login');
//Route::post('/admin/proseslogin', 'AdminController@proseslogin');

Route::get('/admin/destinasi', 'AdminController@desty')->name('/admin/destinasi');
Route::get('/admin/destinasi/add', 'AdminController@add');
Route::post('/admin/destinasi/store','AdminController@store');
Route::get('/admin/destinasi/edit/{id}','AdminController@edit');
Route::put('/admin/destinasi/update/{id}','AdminController@update');
Route::get('/admin/destinasi/hapus/{id}','AdminController@hapus');

Route::get('/admin/destinasi/tes/{id}','AdminController@tes');






