<?php namespace Teamgrid\Project\Http\Controllers;

use Illuminate\Routing\Controller;
use Teamgrid\Project\Models\Project;
use Teamgrid\Project\Http\Resources\ProjectResource;
use LibUser\Userapi\Models\User;
use Carbon\Carbon;

class ProjectController extends Controller {
    public function getProject($id) {
        return ProjectResource::make(Project::findOrFail($id));
    }

    public function createProject() {
        $project = new Project;
        $project->title = post('title');
        $project->customer_id = post('customer_id');
        $project->project_manager_id = auth()->user()->id;
        $project->due_date = Carbon::create(post('due_date'));
        $project->save();
        return ProjectResource::make($project);
    }

    public function updateProject($id){
        $project = Project::where('id', $id)
            ->where('project_manager_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();

        $project->title = post('title');
        $project->customer_id = post('customer_id');
        $project->due_date = Carbon::create(post('due_date'));
        $project->save();
        return ProjectResource::make($project);
    }

    public function completeProject($id) {
        $project = Project::where('id', $id)
        ->where('project_manager_id', auth()->user()->id)
        ->where('done', false)
        ->firstOrFail();

        $project->done = true;
        $project->save();
        return ProjectResource::make($project);
    }

    public function closeProject($id){
        $project = Project::where('id', $id)
            ->where('project_manager_id', auth()->user()->id)
            ->where('done', false)
            ->firstOrFail();
        
        $project->delete();
        return response()->json(['message' => 'Project deleted successfully']);
    }
}