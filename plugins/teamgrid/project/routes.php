<?php
use Illuminate\Support\Facades\Route;
use Teamgrid\Project\Models\Project;

use Teamgrid\Project\Http\Controllers\ProjectController;

Route::group(['prefix' => 'api/v1'], function () {
        Route::get('view/project/{id}', [ProjectController::class, 'getProject']);

        Route::middleware(['auth'])->group(function () {

            Route::post('create/project', [ProjectController::class, 'createProject']);

            Route::post('update/project/{id}', [ProjectController::class, 'updateProject']);

            Route::post('complete/project/{id}', [ProjectController::class, 'completeProject']);
    
            Route::delete('close/project/{id}', [ProjectController::class, 'closeProject']);
            
        });
});