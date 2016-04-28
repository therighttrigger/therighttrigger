<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@homepage');

Route::get('/create');

Route::get('/subscribe', 'HomeController@subscribe');

Route::post('/subscribe', 'HomeController@dosubscribe');

Route::get('/contact', 'HomeController@showcontact');

Route::post('/contact', 'HomeController@docontact');

Route::get('/reviews', 'HomeController@index');

Route::get('/reviews/{slug}', 'HomeController@showreview');
