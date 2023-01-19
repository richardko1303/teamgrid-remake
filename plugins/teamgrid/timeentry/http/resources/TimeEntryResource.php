<?php namespace Teamgrid\TimeEntry\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeEntryResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'task_id' => $this->task_id,
            'tracked_start' => $this->tracked_start,
            'tracked_end' => $this->tracked_end,
        ];
    }
}