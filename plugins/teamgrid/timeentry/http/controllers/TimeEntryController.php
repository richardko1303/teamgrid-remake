<?php namespace Teamgrid\TimeEntry\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Faker\Provider\tr_TR\DateTime;
use Illuminate\Routing\Controller;
use Teamgrid\TimeEntry\Models\TimeEntry;
use Teamgrid\Task\Models\Task;
use Teamgrid\TimeEntry\Http\Resources\TimeEntryResource;

class TimeEntryController extends Controller {
    public function startTracking($id) {
        $timeEntry = TimeEntry::where('task_id', $id)
            ->where('tracked_end', null)
            ->firstOrFail();

        Task::where('id', $id)
            ->where('task_manager_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();

        $timeEntry->tracked_start = now();
        $timeEntry->save();
        return TimeEntryResource::make($timeEntry);
    }

    public function endTracking($id) {
        $timeEntry = TimeEntry::where('task_id', $id)
            ->where('tracked_end', null)
            ->firstOrFail();

        Task::where('id', $id)
            ->where('task_manager_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();
        
        $timeEntry->tracked_end = now();
        $timeEntry->save();
        return TimeEntryResource::make($timeEntry);
    }
}