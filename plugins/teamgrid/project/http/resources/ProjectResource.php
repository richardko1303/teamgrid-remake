<?php namespace Teamgrid\Project\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'customer_id' => $this->customer_id,
            'project_manager_id' => $this->project_manager_id,
            'due_date' => $this->due_date,
        ];
    }
}