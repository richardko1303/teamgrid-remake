<?php namespace Teamgrid\Task\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'task_manager_id' => $this->task_manager_id,
            'project_id' => $this->project_id,
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'done' => $this->done,
        ];
    }
}