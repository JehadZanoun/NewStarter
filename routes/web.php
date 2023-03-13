<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//use Mcamara\LaravelLocalization\LaravelLocalization;

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
    return view('Home');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home') -> middleware('verified');




Route::get('fillable', 'CurdController@getOffers');

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function (){

    Route::get('/', function () {
        return view('Home');
    });

    Auth::routes(['verify' => true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home') -> middleware('verified');





    Route::group(['prefix' => 'offers'], function() {
        // Route::get('store','CurdController@store');
    Route::get('created', 'CurdController@create');
        Route::post('store', 'CurdController@store') -> name('offers.store');
         Route::get('all','CurdController@getAllOffers') -> name('offers.all'); ;

        Route::get('edit/{offer_id}', 'CurdController@editOffer');
        Route::post('update/{offer_id}', 'CurdController@updateOffer') -> name('offers.update');
        Route::get('delete/{offer_id}', 'CurdController@delete') -> name('offers.delete');

    });

    Route::get('youtube','CurdController@getVideo');


    ##################### Begin Ajax Routes  ##################################

    Route::group(['prefix' => 'ajax-offers'], function(){
        route::get('create','offerController@create') ->name('ajax.offer.create');
        route::post('store','offerController@store') ->name('ajax.offer.store');
        route::get('all', 'offerController@all') ->name('ajax.offer.all');
        route::post('delete', 'offerController@delete') ->name('ajax.offer.delete');

        route::get('edit/{offer_id}', 'offerController@edit')->name('ajax.offer.edit');
        route::post('update', 'offerController@update') -> name('ajax.offer.update');

    });


    ##################### End Ajax Routes  ##################################



    ##################### Begin Authentication && Guards  ##################################

    Route::group(['middleware' => 'CheckAge', 'namespace'=>'Auth'], function() {

        Route::get('adults', 'customAuthcontroller@adult')->name('adult');
    });

    Route::get('site', 'customAuthcontroller@site')->name('site');
    Route::get('admin', 'customAuthcontroller@admin')->name('admin');



    ##################### End Authentication && Guards  ##################################

    ##################### Begin Routes Relation  ONe to ONE  ##################################

    Route::get('has-one', 'Relation\RelationController@hasOneRelation');
    Route::get('has-one-revers', 'Relation\RelationController@hasOneRelationRevers');

    Route::get('get-user-has-phone', 'Relation\RelationController@getUserHasPhone');
    Route::get('get-user-has-phone-with-condition', 'Relation\RelationController@getUserHasPhoneWithCondition');

    Route::get('get-user-not-has-phone', 'Relation\RelationController@getUserNotHasPhone');


    ##################### End Routes Relation  ##################################

    ##################### Begin ONe Many Relationship  ##################################
    Route::get('hospital-has-many', 'Relation\RelationController@getHospitalDoctors');

    Route::get('hospitals', 'Relation\RelationController@hospitals')->name('hospital.all');

    Route::get('doctors/{hospital_id}', 'Relation\RelationController@doctors')->name('hospital.doctors');

    Route::get('hospitals/{hospital_id}', 'Relation\RelationController@deleteHospital')->name('hospital.delete');


    Route::get('hospitals_has_doctors', 'Relation\RelationController@hospitalsHasDoctor');

    Route::get('hospitals_has_doctors_male', 'Relation\RelationController@hospitalsHasOnlyMaleDoctor');

    Route::get('hospitals_not_has_doctors', 'Relation\RelationController@hospitalsNotHasDoctor');



    ##################### End ONe Many Relationship  ##################################

    ##################### Begin Two Many Relationship  ##################################

    Route::get('doctors-Services', 'Relation\RelationController@getDoctorServices');

    Route::get('Service-doctor', 'Relation\RelationController@getServiceDoctor');

    Route::get('doctors/Services/{doctor_id}', 'Relation\RelationController@getDoctorServicesById')->name('doctors.services');


});

