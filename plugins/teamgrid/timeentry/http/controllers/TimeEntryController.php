<?php namespace Teamgrid\TimeEntry\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Faker\Provider\tr_TR\DateTime;
use Illuminate\Routing\Controller;
use Teamgrid\TimeEntry\Models\TimeEntry;
use Teamgrid\TimeEntry\Http\Resources\TimeEntryResource;

$now = date_create()->format('Y-m-d H:i:s');

class TimeEntryController extends Controller {
    public function startTracking($id) {
        $timeEntry = TimeEntry::where('task_id', $id)->first();
        $timeEntry->end_time = now();
        $timeEntry->save();
        return TimeEntryResource::make($timeEntry);
    }

    public function endTracking($id) {
        $timeEntry = TimeEntry::where('task_id', $id)->first();
        $timeEntry->end_time = now();
        $timeEntry->save();
        return TimeEntryResource::make($timeEntry);
    }
}