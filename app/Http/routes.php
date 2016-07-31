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

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', ['uses' => 'WdController@index', 'as' => 'home']);
    Route::get('/home', ['uses' => 'WdController@index', 'as' => 'home']);
    Route::get('/dashboard', ['uses' => 'WdController@dashboard', 'as' => 'dashboard']);
    Route::get('/user-login', ['uses' => 'WdController@user_login', 'as' => 'user_login']);
    Route::get('/how-it-works', ['uses' => 'WdController@how_it_works', 'as' => 'how_it_works']);
    Route::get('/join-us', ['uses' => 'WdController@join_us', 'as' => 'join_us']);
    Route::post('/join-us', ['uses' => 'WdController@registration', 'as' => 'join_us']);
    Route::get('/list-your-practice', ['uses' => 'WdController@list_your_practice', 'as' => 'list_your_practice']);
    Route::get('/medical-group', ['uses' => 'WdController@medical_group', 'as' => 'medical_group']);
    Route::get('/authorization', ['uses' => 'WdController@authorization', 'as' => 'authorization']);
    Route::get('/doctor-profile', ['uses' => 'WdController@doctor_profile', 'as' => 'doctor_profile']);
    Route::get('/settings', ['uses' => 'WdController@settings', 'as' => 'settings']);
    Route::get('/get-started', ['uses' => 'WdController@get_started', 'as' => 'get_started']);
    Route::get('/medical-search', ['uses' => 'WdController@medical_search', 'as' => 'medical_search']);
    Route::get('/book-appointment', ['uses' => 'WdController@book_appointment', 'as' => 'book_appointment']);
    Route::post('/authenticate', ['uses' => 'WdController@authenticate', 'as' => 'authenticate']);

    Route::get('/send-email', ['uses' => 'WdController@send_email', 'as' => 'send_email']);
});