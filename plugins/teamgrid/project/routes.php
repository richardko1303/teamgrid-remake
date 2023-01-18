<?php
use Illuminate\Support\Facades\Route;
use Teamgrid\Project\Models\Project;

use Teamgrid\Project\Http\Controllers\ProjectController;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {

        Route::get('view/project/{id}', [ProjectController::class, 'getProject']);

        Route::post('create/project', [ProjectController::class, 'createProject']);

    });
});