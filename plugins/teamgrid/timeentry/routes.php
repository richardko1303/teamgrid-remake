<?php
use Illuminate\Support\Facades\Route;
use Teamgrid\TimeEntry\Models\TimeEntry;

use Teamgrid\TimeEntry\Http\Controllers\TimeEntryController;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {

        Route::post('tracking/start/{id}', [TimeEntryController::class, 'startTracking']);

        Route::post('tracking/end/{id}', [TimeEntryController::class, 'endTracking']);

    });
});