<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->event_name,
            'description' => $this->event_description,
            'start_time' => $this->event_start,
            'end_time' => $this->event_end,

            'users' => new UserResource($this->whenLoaded('user')),
            'attendees' => AttendeeResource::collection($this->whenLoaded('attendee'))
        ];
    }
}