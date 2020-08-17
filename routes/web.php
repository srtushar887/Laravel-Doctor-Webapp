<?php

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

Route::get('/', 'FrontendController@index')->name('front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {

        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //general settings
        Route::get('/general-settings', 'Admin\AdminController@general_settings')->name('admin.general.settings');
        Route::post('/general-settings-update', 'Admin\AdminController@general_settings_update')->name('admin.general.settings.update');

    });
});



Route::prefix('doctor')->group(function (){
    Route::get('/register', 'Auth\DcotorLoginController@showRegisterform')->name('doctor.register');
    Route::post('/register-save', 'Auth\DcotorLoginController@doctor_register_save')->name('doctor.register.submit');
    Route::get('/login', 'Auth\DcotorLoginController@showLoginform')->name('doctor.login');
    Route::post('/login', 'Auth\DcotorLoginController@login')->name('doctor.login.submit');
    Route::get('/logout', 'Auth\DcotorLoginController@logout')->name('doctor.logout');
});


Route::group(['middleware' => ['auth:doctor']], function() {
    Route::prefix('doctor')->group(function() {

        Route::get('/', 'Doctor\DcotorController@index')->name('doctor.dashboard');

        //medicine
        Route::get('/medicine', 'Doctor\DcotorMasterDataController@medicine')->name('doctor.medicine');
        Route::get('/medicine-get', 'Doctor\DcotorMasterDataController@medicine_get')->name('get_medicine');
        Route::post('/medicine-save', 'Doctor\DcotorMasterDataController@medicine_save')->name('doctor.medicine.save');
        Route::post('/medicine-single', 'Doctor\DcotorMasterDataController@medicine_single')->name('get.single.medicine');
        Route::post('/medicine-update', 'Doctor\DcotorMasterDataController@medicine_update')->name('doctor.medicine.update');
        Route::post('/medicine-delete', 'Doctor\DcotorMasterDataController@medicine_delete')->name('doctor.medicine.delete');


        //diagnosis
        Route::get('/diagnosis', 'Doctor\DcotorMasterDataController@diagnosis')->name('doctor.diagnosis');
        Route::get('/diagnosis-get', 'Doctor\DcotorMasterDataController@diagnosis_get')->name('get_diagnosis');
        Route::post('/diagnosis-save', 'Doctor\DcotorMasterDataController@diagnosis_save')->name('doctor.diagnosis.save');
        Route::post('/diagnosis-single', 'Doctor\DcotorMasterDataController@diagnosis_single')->name('get.single.diagnosis');
        Route::post('/diagnosis-update', 'Doctor\DcotorMasterDataController@diagnosis_update')->name('doctor.diagnosis.update');
        Route::post('/diagnosis-delete', 'Doctor\DcotorMasterDataController@diagnosis_delete')->name('doctor.diagnosis.delete');


        //examination
        Route::get('/examination', 'Doctor\DcotorMasterDataController@examination')->name('doctor.examination');
        Route::get('/examination-get', 'Doctor\DcotorMasterDataController@examination_get')->name('get_examination');
        Route::post('/examination-save', 'Doctor\DcotorMasterDataController@examination_save')->name('doctor.examination.save');
        Route::post('/examination-single', 'Doctor\DcotorMasterDataController@examination_single')->name('get.single.examination');
        Route::post('/examination-update', 'Doctor\DcotorMasterDataController@examination_update')->name('doctor.examination.update');
        Route::post('/examination-delete', 'Doctor\DcotorMasterDataController@examination_delete')->name('doctor.examination.delete');



    });
});


