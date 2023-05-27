<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
{

    public function toArray($request)
    {
           return [
                'name' => $this->name,
                'role' => $this->role,
                'description' => $this->description,
                'image' => $this->image,
                'user_id' => $this->user_id,
            ];

    }
}
