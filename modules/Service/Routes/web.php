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


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:dashboard'], function(){

    // other routes
    Route::group(['prefix' => 'services', 'as' => 'service.'], function(){

        //the grouped operations (declare them before resource routes to avoid conflicts)
        Route::delete('delete-many', [Modules\Service\Http\Controllers\ServiceController::class, 'destroyMany'])
        ->name('destroy.many');

        Route::get('ajax/datatable', ServiceDatatableController::class)
            ->name('datatable');

        //Model Resources routes
        //didn't use resource to have the ability to attach permission middleware to each route
        // avoid using middlewares inside of controllers keep this structure maintained
        Route::get('/',[Modules\Service\Http\Controllers\ServiceController::class, 'index'])
            ->name('index');
        
        Route::post('/',[Modules\Service\Http\Controllers\ServiceController::class, 'store'])
            ->name('store');

        Route::get('create',[Modules\Service\Http\Controllers\ServiceController::class, 'create'])
            ->name('create');

        Route::put('{service}',[Modules\Service\Http\Controllers\ServiceController::class, 'update'])
            ->name('update');

        Route::get('{service}/edit',[Modules\Service\Http\Controllers\ServiceController::class, 'edit'])
            ->name('edit');

        Route::delete('{service}',[Modules\Service\Http\Controllers\ServiceController::class, 'destroy'])
            ->name('destroy');

            
        // trashed routes
        Route::group(['prefix' => 'trashed', 'as' => 'trashed.', 'namespace' => 'Trashed'], function(){
            //the grouped operations (declare them before resource routes to avoid conflicts)
            Route::delete('/delete-many', [Modules\Service\Http\Controllers\Trashed\ServiceTrashedController::class, 'destroyMany'])
                ->name('destroy.many');

            Route::post('/restore-many', [Modules\Service\Http\Controllers\Trashed\ServiceTrashedController::class, 'restoreMany'])
                ->name('restore.many');

            // trashed resource operation
            Route::delete('/{service}', [Modules\Service\Http\Controllers\Trashed\ServiceTrashedController::class, 'destroy'])
                ->name('destroy');

            Route::post('/{service}', [Modules\Service\Http\Controllers\Trashed\ServiceTrashedController::class, 'restore'])
                ->name('restore');

            Route::get('/ajax/datatable', ServiceTrashedDataTableController::class)
                ->name('datatable');
        });

    });
});


