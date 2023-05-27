<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
           'name' => $this->name,
            'duration' => $this->duration,
            'description' => $this->description,
            'user_id' => $this->user_id,
        ];
    }
}
