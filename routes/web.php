<?php

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

//Home page

Route::get('/', function () {
    return view('home');
});

//Route for generating a short url

Route::post('/','UrlGeneratorController@create');

//Route for redirecting previously generated short url

Route::get('/{url}','UrlGeneratorController@show');
