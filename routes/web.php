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

    Route::group(['prefix' => 'offers'], function() {
        // Route::get('store','CurdController@store');
    Route::get('created', 'CurdController@create');
        Route::post('store', 'CurdController@store') -> name('offers.store');
         Route::get('all','CurdController@getAllOffers');



    });



});

