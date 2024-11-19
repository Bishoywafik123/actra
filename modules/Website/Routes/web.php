<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

Route::group(['as' => 'web.'], function () {
    // pages
    Route::get('/', 'HomeController@index')->name('home');
   
    Route::get('/page', 'HomeController@page')->name('page');

    Route::get('/services', 'HomeController@services')->name('services');
    Route::get('/services/{slug}', 'HomeController@show_service')->name('service.show');
    Route::post('/services/request/send', 'HomeController@request_service')->name('request.send');


    Route::get('/products', 'HomeController@products')->name('products');
    Route::get('/products/{category_slug}/{slug}/{id}', 'HomeController@show_product')->name('product.show');


    Route::get('/categories', 'HomeController@categories')->name('categories');
    Route::get('/category/{slug}/{id}', 'HomeController@show_category')->name('category.show');

    Route::get('/news', 'HomeController@news')->name('news');
    Route::get('/news/{slug}/{id}', 'HomeController@show_news')->name('news.show');

    Route::get('/gallary', 'HomeController@gallary')->name('gallary');

    Route::get('/contact', 'HomeController@contact')->name('contact');

    Route::get('/request-quote', 'HomeController@request_quote')->name('request_quote');
    Route::post('/mail/send', 'HomeController@send_mail')->name('mail.send');


    Route::get('/cookies', 'HomeController@cookies')->name('cookies');
    Route::get('/search', 'HomeController@search')->name('search');

    


    Route::post('/accept-cookie', function () {
        session(['cookie_accepted' => true]);
        return response()->json(['status' => 'Cookie accepted']);
    })->name('accept.cookie');


});
});

