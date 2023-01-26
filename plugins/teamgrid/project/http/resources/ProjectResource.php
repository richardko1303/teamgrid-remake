<?php namespace Teamgrid\Project\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LibUser\Userapi\Http\Resources\UserResource;
use Teamgrid\Task\Http\Resources\TaskResource;

class ProjectResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'customer_id' => $this->customer_id,
            'project_manager_id' => $this->project_manager_id,
            'due_date' => $this->due_date,
            'done' => $this->done,
            'project_manager' => new UserResource($this->project_manager),
            'customer' => new UserResource($this->customer),
            'accounter' => $this->accounter,
        ];
    }
}