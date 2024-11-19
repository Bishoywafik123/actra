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



Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:dashboard'], function () {

    // rest of routes
    Route::group(['prefix' => 'settings', 'as' => 'setting.'], function () {

        //Model Resources routes
        //didn't use resource to have the ability to attach permission middleware to each route
        // avoid using middlewares inside of controllers keep this structure maintained
        Route::get('/', [Modules\Setting\Http\Controllers\SettingController::class, 'setting'])
            ->name('index');

        Route::post('/update', [Modules\Setting\Http\Controllers\SettingController::class, 'update_setting'])
            ->name('update');

    });

  



});

