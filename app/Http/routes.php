<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','ArticlesController@index');

//Route::get('/about','SitesController@about');

//Route::get('contact','SitesController@contact');

//Route::get('/articles','ArticlesController@index');
//
////create 放入 {id} 上面，否则会把create 当成参数
//Route::get('/articles/create','ArticlesController@create');
//
//Route::get('/articles/{id}','ArticlesController@show');
//
//Route::post('/articles','ArticlesController@store');
//
//Route::get('/articles/{id}/edit','ArticlesController@edit');
//一键注册全部路由
Route::get('articles/about','ArticlesController@about');
Route::post('articles/image','ArticlesController@image');
Route::post('articles/search','ArticlesController@postSearch');
Route::get('articles/search/{column}/{condition}/{character}','ArticlesController@search');
Route::get('articles/{id}/delete','ArticlesController@destroy');
Route::resource('articles','ArticlesController');

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback','Auth\AuthController@handleProviderCallback');

Route::get('auth/login','Auth\AuthController@getLogin');

Route::post('auth/login','Auth\AuthController@postLogin');

Route::get('auth/register','Auth\AuthController@getRegister');

Route::post('auth/register','Auth\AuthController@postRegister');

Route::get('auth/logout','Auth\AuthController@getLogout');

