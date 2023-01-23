<?php namespace Teamgrid\Task\Http\Controllers;

use Illuminate\Routing\Controller;
use Teamgrid\Task\Models\Task;
use Teamgrid\Task\Http\Resources\TaskResource;
use Teamgrid\Project\Models\Project;
use Carbon\Carbon;

use Teamgrid\TimeEntry\Models\TimeEntry;

class TaskController extends Controller {
    public function getTask($id) {
        $task = Task::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();
        return TaskResource::make($task);
    }

    public function createTask() {

        Project::where('id', post('project_id'))
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();

        $task = new Task;
        $task->project_id = post('project_id');
        $task->user_id = auth()->user()->id;
        $task->name = post('name');
        $task->description = post('description');
        $task->due_date = Carbon::create(post('due_date'));
        $task->done = false;
        $task->save();

        return TaskResource::make($task);
    }

    public function updateTask($id) {
        $task = Task::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();
        
        $task->project_id = post('project_id');
        $task->name = post('name');
        $task->description = post('description');
        $task->due_date = Carbon::create(post('due_date'));
        $task->save();
        return TaskResource::make($task);
    }

    public function completeTask($id) {
        $task = Task::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();

        $task->done = true;
        $task->save();
        return TaskResource::make($task);
    }

    public function closeTask($id) {
        $task = Task::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();

        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }
}