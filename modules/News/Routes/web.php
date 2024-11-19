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
        Route::group(['prefix' => 'blogs', 'as' => 'news.'], function () {

            //the grouped operations (declare them before resource routes to avoid conflicts)
            Route::delete('delete-many', [Modules\News\Http\Controllers\NewsController::class, 'destroyMany'])
            ->name('destroy.many');
    
    
            Route::get('ajax/datatable', NewsDatatableController::class)
                ->name('datatable');
    
    
            //Model Resources routes
            //didn't use resource to have the ability to attach permission middleware to each route
            // avoid using middlewares inside of controllers keep this structure maintained
            Route::get('/',[Modules\News\Http\Controllers\NewsController::class, 'index'])
                ->name('index');
    
            
            Route::post('/',[Modules\News\Http\Controllers\NewsController::class, 'store'])
                ->name('store');
    
    
            Route::get('create',[Modules\News\Http\Controllers\NewsController::class, 'create'])
                ->name('create');
    
    
            Route::put('{news}',[Modules\News\Http\Controllers\NewsController::class, 'update'])
                ->name('update');
    
            Route::get('{news}/edit',[Modules\News\Http\Controllers\NewsController::class, 'edit'])
                ->name('edit');
    
    
            Route::delete('{news}',[Modules\News\Http\Controllers\NewsController::class, 'destroy'])
                ->name('destroy');
    
            Route::post('/upload-image', [Modules\News\Http\Controllers\NewsController::class, 'upload_photo'])->name('upload.image');

            });


        
});