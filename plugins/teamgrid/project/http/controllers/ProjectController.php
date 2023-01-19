<?php namespace Teamgrid\Project\Http\Controllers;

use Illuminate\Routing\Controller;
use Teamgrid\Project\Models\Project;
use Teamgrid\Project\Http\Resources\ProjectResource;

class ProjectController extends Controller {
    public function getProject($id) {
        return ProjectResource::make(Project::findOrFail($id));
    }

    public function createProject() {
        $project = new Project;
        $project->title = post('title');
        $project->customer_id = post('customer_id');
        $project->project_manager_id = post('project_manager_id');
        $project->due_date = post('due_date');
        $project->save();
        return ProjectResource::make($project);
    }

    public function updateProject($id){
        $project = Project::findOrFail($id);
        $project->title = post('title');
        $project->customer_id = post('customer_id');
        $project->project_manager_id = post('project_manager_id');
        $project->due_date = post('due_date');
        $project->save();
        return ProjectResource::make($project);
    }

    public function closeProject($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['message' => 'Project deleted successfully']);
    }
}