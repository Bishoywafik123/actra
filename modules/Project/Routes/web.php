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

    // other routes
    Route::group(['prefix' => 'projects', 'as' => 'project.'], function () {

        //the grouped operations (declare them before resource routes to avoid conflicts)
        Route::delete('delete-many', [Modules\Project\Http\Controllers\ProjectController::class, 'destroyMany'])
            ->name('destroy.many');

        Route::get('ajax/datatable', ProjectDatatableController::class)
            ->name('datatable');

        //Model Resources routes
        //didn't use resource to have the ability to attach permission middleware to each route
        // avoid using middlewares inside of controllers keep this structure maintained
        Route::get('/', [Modules\Project\Http\Controllers\ProjectController::class, 'index'])
            ->name('index');

        Route::post('/', [Modules\Project\Http\Controllers\ProjectController::class, 'store'])
            ->name('store');

        Route::get('create', [Modules\Project\Http\Controllers\ProjectController::class, 'create'])
            ->name('create');

        Route::put('{project}', [Modules\Project\Http\Controllers\ProjectController::class, 'update'])
            ->name('update');

        Route::get('{project}/edit', [Modules\Project\Http\Controllers\ProjectController::class, 'edit'])
            ->name('edit');

        Route::delete('{project}', [Modules\Project\Http\Controllers\ProjectController::class, 'destroy'])
            ->name('destroy');

        Route::post('/upload/photos', [Modules\Project\Http\Controllers\ProjectController::class, 'upload_photos'])
            ->name('upload_photos');

        Route::delete('/delete/photos', [Modules\Project\Http\Controllers\ProjectController::class, 'delete_photos'])
            ->name('delete_photos');

        Route::get('/photos/get', [Modules\Project\Http\Controllers\ProjectController::class, 'get_photos'])
            ->name('get_photos');


            // mainphoto;
        Route::post('/upload/photo', [Modules\Project\Http\Controllers\ProjectController::class, 'upload_mainphoto'])
            ->name('upload_mainphoto');

        Route::delete('/delete/photo', [Modules\Project\Http\Controllers\ProjectController::class, 'delete_mainphoto'])
            ->name('delete_mainphoto');

        Route::get('/photo/get', [Modules\Project\Http\Controllers\ProjectController::class, 'get_mainphoto'])
            ->name('get_mainphoto');


        // trashed routes
        Route::group(['prefix' => 'trashed', 'as' => 'trashed.', 'namespace' => 'Trashed'], function () {
            //the grouped operations (declare them before resource routes to avoid conflicts)
            Route::delete('/delete-many', [Modules\Project\Http\Controllers\Trashed\ProjectTrashedController::class, 'destroyMany'])
                ->name('destroy.many');

            Route::post('/restore-many', [Modules\Project\Http\Controllers\Trashed\ProjectTrashedController::class, 'restoreMany'])
                ->name('restore.many');

            // trashed resource operation
            Route::delete('/{project}', [Modules\Project\Http\Controllers\Trashed\ProjectTrashedController::class, 'destroy'])
                ->name('destroy');

            Route::post('/{project}', [Modules\Project\Http\Controllers\Trashed\ProjectTrashedController::class, 'restore'])
                ->name('restore');

            Route::get('/ajax/datatable', ProjectTrashedDataTableController::class)
                ->name('datatable');
        });
    });
});


