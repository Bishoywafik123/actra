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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:dashboard'], function(){

    // other routes
    Route::group(['prefix' => 'whies', 'as' => 'why.'], function(){

        //the grouped operations (declare them before resource routes to avoid conflicts)
        Route::delete('delete-many', [Modules\Why\Http\Controllers\WhyController::class, 'destroyMany'])
        ->name('destroy.many');

        Route::get('ajax/datatable', WhyDatatableController::class)
            ->name('datatable');

        //Model Resources routes
        //didn't use resource to have the ability to attach permission middleware to each route
        // avoid using middlewares inside of controllers keep this structure maintained
        Route::get('/',[Modules\Why\Http\Controllers\WhyController::class, 'index'])
            ->name('index');
        
        Route::post('/',[Modules\Why\Http\Controllers\WhyController::class, 'store'])
            ->name('store');

        Route::get('create',[Modules\Why\Http\Controllers\WhyController::class, 'create'])
            ->name('create');

        Route::put('{why}',[Modules\Why\Http\Controllers\WhyController::class, 'update'])
            ->name('update');

        Route::get('{why}/edit',[Modules\Why\Http\Controllers\WhyController::class, 'edit'])
            ->name('edit');

        Route::delete('{why}',[Modules\Why\Http\Controllers\WhyController::class, 'destroy'])
            ->name('destroy');

    });
});

});