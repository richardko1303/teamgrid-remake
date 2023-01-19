<?php
use Illuminate\Support\Facades\Route;
use Teamgrid\Task\Models\Task;

use Teamgrid\Task\Http\Controllers\TaskController;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {

        Route::get('view/task/{id}', [TaskController::class, 'getTask']);

        Route::post('create/task', [TaskController::class, 'createTask']);

        Route::post('update/task/{id}', [TaskController::class, 'updateTask']);

        Route::post('complete/task/{id}', [TaskController::class, 'completeTask']);

        Route::delete('close/task/{id}', [TaskController::class, 'closeTask']);

    });
});