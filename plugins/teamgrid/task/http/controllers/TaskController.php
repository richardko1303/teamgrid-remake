<?php namespace Teamgrid\Task\Http\Controllers;

use Illuminate\Routing\Controller;
use Teamgrid\Task\Models\Task;
use Teamgrid\Task\Http\Resources\TaskResource;

use Teamgrid\TimeEntry\Models\TimeEntry;

class TaskController extends Controller {
    public function getTask($id) {
        $task = Task::find($id);
        return TaskResource::make($task);
    }

    public function createTask() {
        $task = new Task;
        $task->project_id = post('project_id');
        $task->name = post('name');
        $task->description = post('description');
        $task->due_date = post('due_date');
        $task->done = false;
        $task->save();

        $timeEntry = new TimeEntry;
        $timeEntry->task_id = $task->id;
        $timeEntry->tracked_start = null;
        $timeEntry->tracked_end = null;
        $timeEntry->save();
        return TaskResource::make($task);
    }

    public function updateTask($id) {
        $task = Task::findOrFail($id);
        $task->project_id = post('project_id');
        $task->name = post('name');
        $task->description = post('description');
        $task->due_date = post('due_date');
        $task->save();
        return TaskResource::make($task);
    }

    public function completeTask($id) {
        $task = Task::findOrFail($id);
        $task->done = true;
        $task->save();
        return TaskResource::make($task);
    }

    public function closeTask($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }
}