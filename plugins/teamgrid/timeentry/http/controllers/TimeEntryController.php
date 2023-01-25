<?php namespace Teamgrid\TimeEntry\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Faker\Provider\tr_TR\DateTime;
use Illuminate\Routing\Controller;
use Teamgrid\TimeEntry\Models\TimeEntry;
use Teamgrid\Task\Models\Task;
use Teamgrid\TimeEntry\Http\Resources\TimeEntryResource;
use Carbon\Carbon;

class TimeEntryController extends Controller {
    public function startTracking($id) {
        $task = Task::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();

        $timeEntry = new TimeEntry;
        $timeEntry->task_id = $task->id;
        $timeEntry->tracked_start = Carbon::create(now());
        $timeEntry->tracked_end = null;
        $timeEntry->total_time = null;
        $timeEntry->save();
        return TimeEntryResource::make($timeEntry);
    }

    public function endTracking($id) {
        $timeEntry = TimeEntry::where('task_id', $id)
            ->where('tracked_end', null)
            ->firstOrFail();

        Task::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();

        // $start = Carbon::create($timeEntry->tracked_start);
        // $finish = Carbon::create(now());
        // $total_time = $start->diffInHours($start) . ':' . $start->diff($finish)->format('%I:%S');

        
        $timeEntry->tracked_end = Carbon::create(now());
        // $timeEntry->total_time = $total_time;
        $timeEntry->save();
        return TimeEntryResource::make($timeEntry);

    }
}