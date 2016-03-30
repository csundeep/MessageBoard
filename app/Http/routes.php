<?php


Route::get('/', array('uses' => 'MessageBoardController@showMessageBoard'));

Route::get('login', array('uses' => 'LoginController@showLogin'));
Route::get('post/login', array('uses' => 'LoginController@showLogin'));
Route::post('login', array('uses' => 'LoginController@doLogin'));
Route::post('post/login', array('uses' => 'LoginController@postLogin'));
Route::get('logout', array('uses' => 'LoginController@doLogout'));
Route::get('post/logout', array('uses' => 'LoginController@doLogout'));


Route::get('register', array('uses' => 'RegisterController@showRegistration'));
Route::get('post/register', array('uses' => 'RegisterController@showRegistration'));
Route::post('register', array('uses' => 'RegisterController@doRegistration'));
Route::post('post/register', array('uses' => 'RegisterController@doRegistration'));

Route::post('postQuery', array('uses' => 'MessageBoardController@postQuery'));
Route::get('post/{id}', array('uses' => 'MessageBoardController@showPost'));
Route::get('postComment/{comment}', array('uses' => 'MessageBoardController@postComment'));

Route::group(['middleware' => 'web'], function() {
    // Place all your web routes here...(Cut all `Route` which are define in `Route file`, paste here)
});