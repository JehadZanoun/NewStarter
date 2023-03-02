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


    ##################### End Authentication && Guards  ##################################

    ##################### Begin Routes Relation  ONe to ONE  ##################################

    Route::get('has-one', 'Relation\RelationController@hasOneRelation');


        ##################### End Routes Relation  ##################################


});

