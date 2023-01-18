<?php namespace Teamgrid\Project\Http\Controllers;

use Illuminate\Routing\Controller;
use Teamgrid\Project\Models\Project;
use Teamgrid\Project\Http\Resources\ProjectResource;

class ProjectController extends Controller {
    public function getProject($id) {
        return ProjectResource::collection(Project::find($id));
    }

    public function createProject() {
        $project = new Project;
        $project->title = 'Test Project';
        $project->customer_id = 1;
        $project->project_manager_id = 1;
        $project->due_date = '2021-01-01';
        $project->save();
        return ProjectResource::make($project);
    }
}

// TODO: Fixni "Call to undefined method Teamgrid\Project\Models\Project::mapInto()"