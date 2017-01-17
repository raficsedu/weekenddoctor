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
    Route::post('/medical-search', ['uses' => 'WdController@medical_search', 'as' => 'medical_search']);
    Route::post('/book-appointment/{doctor_id}', ['uses' => 'WdController@book_appointment', 'as' => 'book_appointment']);
    Route::get('/book-appointment', function () {
        return redirect('/');
    });
    Route::post('/confirm-booking', ['uses' => 'WdController@confirm_booking', 'as' => 'confirm_booking']);
    Route::get('/nearby-doctors', ['uses' => 'WdController@nearby_doctors', 'as' => 'nearby_doctors']);

    //Registration Route
    Route::get('/join-us', ['uses' => 'RegistrationController@join_us', 'as' => 'join_us']);
    Route::get('/get-started', ['uses' => 'RegistrationController@get_started', 'as' => 'get_started']);
    Route::post('/patient-registration', ['uses' => 'RegistrationController@patient_registration', 'as' => 'patient_registration']);
    Route::post('/doctor-registration', ['uses' => 'RegistrationController@doctor_registration', 'as' => 'doctor_registration']);


    //Login Route
    Route::get('/user-login', ['uses' => 'LoginController@user_login', 'as' => 'user_login']);
    Route::get('/login', ['uses' => 'LoginController@user_login', 'as' => 'user_login']);
    Route::post('/authenticate', ['uses' => 'LoginController@authenticate', 'as' => 'authenticate']);

    //Patient Route
    Route::get('/patient/settings', ['uses' => 'PatientController@patient_settings', 'as' => 'patient_settings']);
    Route::get('/patient/medicalteam', ['uses' => 'PatientController@patient_medicalteam', 'as' => 'patient_medicalteam']);
    Route::get('/patient/appointments', ['uses' => 'PatientController@patient_appointments', 'as' => 'patient_appointments']);
    Route::post('/patient-profile', ['uses' => 'PatientController@patientProfile', 'as' => 'patient_profile']);
    Route::post('/patient-password-change', ['uses' => 'PatientController@passwordChange', 'as' => 'patient_password_change']);
    Route::post('/notification-settings', ['uses' => 'PatientController@notificationSettings', 'as' => 'notification_settings']);
    Route::post('/demographic-settings', ['uses' => 'PatientController@demographicSettings', 'as' => 'demographic_settings']);
    Route::post('/insurance-settings', ['uses' => 'PatientController@insuranceSettings', 'as' => 'insurance_settings']);
    Route::get('/deactive-account', ['uses' => 'PatientController@deactiveAccount', 'as' => 'deactive_account']);

    //Doctor Route
    Route::get('/doctor-profile', ['uses' => 'WdController@doctor_profile', 'as' => 'doctor_profile']);
    Route::get('/doctor/appointments', ['uses' => 'DoctorController@appointments', 'as' => 'doctor_appointments']);
    Route::get('/doctor/schedule', ['uses' => 'DoctorController@schedule', 'as' => 'doctor_schedule']);
    Route::get('/doctor/settings', ['uses' => 'DoctorController@settings', 'as' => 'doctor_settings']);
    Route::get('/get-time-slot', ['uses' => 'DoctorController@get_time_slot', 'as' => 'get_time_slot']);
    Route::post('/save-doctor-schedule', ['uses' => 'DoctorController@save_doctor_schedule', 'as' => 'save_doctor_schedule']);
    Route::post('/doctor/profile', ['uses' => 'DoctorController@doctorProfile', 'as' => 'doctor_profile']);
    Route::post('/doctor-password-change', ['uses' => 'DoctorController@passwordChange', 'as' => 'doctor_password_change']);
    Route::get('/doctor/deactive-account', ['uses' => 'DoctorController@deactiveAccount', 'as' => 'deactive_account']);
    Route::post('/doctor/office/info', ['uses' => 'DoctorController@doctorOfficeInfo', 'as' => 'doctor_office_info']);
    Route::get('/insert-doctor-off-day', ['uses' => 'DoctorController@insert_off_day', 'as' => 'insert_off_day']);
    Route::get('/save-off-days', ['uses' => 'DoctorController@save_off_days', 'as' => 'save_off_days']);
    Route::get('/delete-off-days', ['uses' => 'DoctorController@delete_off_days', 'as' => 'delete_off_days']);
    Route::post('/save-doctor-settings', ['uses' => 'DoctorController@save_doctor_settings', 'as' => 'save_doctor_settings']);
    Route::get('/doctor/{id}', ['uses' => 'DoctorController@doctor_profile', 'as' => 'doctor_profile']);

    //Email Confirmation
    Route::get('/confirmation/{user_id}/{code}', ['uses' => 'EmailController@email_verify', 'as' => 'email_verify']);
    Route::get('/send-email', ['uses' => 'WdController@send_email', 'as' => 'send_email']);

    //Static Pages Route
    Route::get('/test', ['uses' => 'WdController@test', 'as' => 'test']);

    //Common Operation Route
    Route::post('/cancel-appointment', ['uses' => 'WdController@cancel_appointment', 'as' => 'cancel_appointment']);

    //Admin Route
    Route::get('/admin', ['uses' => 'AdminController@admin', 'as' => 'admin']);
    Route::get('/add-doctor', ['uses' => 'AdminController@add_doctor', 'as' => 'add_doctor']);
    Route::get('/all-doctor', ['uses' => 'AdminController@all_doctor', 'as' => 'all_doctor']);
    Route::get('/add-patient', ['uses' => 'AdminController@add_patient', 'as' => 'add_patient']);
    Route::get('/all-patient', ['uses' => 'AdminController@all_patient', 'as' => 'all_patient']);
    Route::get('/admin-settings', ['uses' => 'AdminController@admin_settings', 'as' => 'admin_settings']);
    Route::get('/system-settings', ['uses' => 'AdminController@system_settings', 'as' => 'system_settings']);
    Route::post('/system-settings', ['uses' => 'AdminController@save_system_settings', 'as' => 'save_system_settings']);
    Route::post('/change-password', ['uses' => 'AdminController@passwordChange', 'as' => 'change_password']);
    Route::get('/admin/{action}/{type}/{user_id}', ['uses' => 'AdminController@action', 'as' => 'action']);
    Route::post('/admin-register', ['uses' => 'RegistrationController@admin_register', 'as' => 'admin_register']);
});