<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user,
            'event_id'=>$this->event,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'zone'=>$this->zone,
        ];
    }
}
