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

    //Common Route
    Route::auth();
    Route::get('/', ['uses' => 'WdController@index', 'as' => 'home']);
    Route::get('/home', ['uses' => 'WdController@index', 'as' => 'home']);
    Route::get('/dashboard', ['uses' => 'WdController@dashboard', 'as' => 'dashboard']);

    //Front End Route
    Route::get('/how-it-works', ['uses' => 'WdController@how_it_works', 'as' => 'how_it_works']);
    Route::get('/list-your-practice', ['uses' => 'WdController@list_your_practice', 'as' => 'list_your_practice']);
    Route::get('/medical-group', ['uses' => 'WdController@medical_group', 'as' => 'medical_group']);
    Route::get('/authorization', ['uses' => 'WdController@authorization', 'as' => 'authorization']);
    Route::get('/medical-search', ['uses' => 'WdController@medical_search', 'as' => 'medical_search']);
    Route::get('/book-appointment', ['uses' => 'WdController@book_appointment', 'as' => 'book_appointment']);


    //Registration Route
    Route::get('/join-us', ['uses' => 'RegistrationController@join_us', 'as' => 'join_us']);
    Route::get('/get-started', ['uses' => 'RegistrationController@get_started', 'as' => 'get_started']);
    Route::post('/patient-registration', ['uses' => 'RegistrationController@patient_registration', 'as' => 'patient_registration']);
    Route::post('/doctor-registration', ['uses' => 'RegistrationController@doctor_registration', 'as' => 'doctor_registration']);


    //Login Route
    Route::get('/user-login', ['uses' => 'LoginController@user_login', 'as' => 'user_login']);
    Route::post('/authenticate', ['uses' => 'LoginController@authenticate', 'as' => 'authenticate']);

    //Patient Route
    Route::get('/settings', ['uses' => 'PatientController@settings', 'as' => 'settings']);

    //Doctor Route
    Route::get('/doctor-profile', ['uses' => 'WdController@doctor_profile', 'as' => 'doctor_profile']);

    //Email Confirmation
    Route::get('/confirmation/{user_id}/{code}', ['uses' => 'EmailController@email_verify', 'as' => 'email_verify']);
    Route::get('/send-email', ['uses' => 'WdController@send_email', 'as' => 'send_email']);

    //Static Pages Route
    Route::get('/test', ['uses' => 'WdController@test', 'as' => 'test']);
});