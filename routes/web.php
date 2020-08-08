<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','AdvertController@searchAdverts');

Route::get('/show/{id}','AdvertController@showAdvert');

Route::get('/find/','AdvertController@findAdverts');

Route::get('/myAccount/myAdverts/','UserAdvertsController@listUserAdverts');

Route::get('/myAccount/myAdverts/delete/{id}','AdvertController@deleteAdvert');

Route::get('/myAccount/myAdverts/edit/{id}','AdvertController@editAdvert');

Route::get('/myAccount/addAdvert/','AdvertController@addAdvert');

Route::post('/myAccount/addAdvert/store','UserAdvertsController@storeUserAdvert');

Route::get('/myAccount','UserController@showUser');

Route::get('/myAccount/delete/','UserA`dvertsController@deleteUserAdverts');

Route::get('/myAccount/logout','UserController@logoutUser');

Route::get('/myAccount/edit/','UserController@editUser');

Route::post('/myAccount/edit/storeData','UserController@storeUserData');

Route::post('/myAccount/edit/storeEmail','UserController@storeUserEmail');

Route::post('/myAccount/edit/storePassword','UserController@storeUserPassword');

Auth::routes();
