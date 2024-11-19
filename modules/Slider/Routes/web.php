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
        Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {

            //the grouped operations (declare them before resource routes to avoid conflicts)
            Route::delete('delete-many', [Modules\Slider\Http\Controllers\SliderController::class, 'destroyMany'])
            ->name('destroy.many');
    
    
            Route::get('ajax/datatable', SliderDatatableController::class)
                ->name('datatable');
    
    
            //Model Resources routes
            //didn't use resource to have the ability to attach permission middleware to each route
            // avoid using middlewares inside of controllers keep this structure maintained
            Route::get('/',[Modules\Slider\Http\Controllers\SliderController::class, 'index'])
                ->name('index');
    
            
            Route::post('/',[Modules\Slider\Http\Controllers\SliderController::class, 'store'])
                ->name('store');
    
    
            Route::get('create',[Modules\Slider\Http\Controllers\SliderController::class, 'create'])
                ->name('create');
    
    
            Route::put('{slider}',[Modules\Slider\Http\Controllers\SliderController::class, 'update'])
                ->name('update');
    
            Route::get('{slider}/edit',[Modules\Slider\Http\Controllers\SliderController::class, 'edit'])
                ->name('edit');
    
    
            Route::delete('{slider}',[Modules\Slider\Http\Controllers\SliderController::class, 'destroy'])
                ->name('destroy');
    
            });


        
});