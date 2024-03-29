<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => $this->user_id,
        ];
    }
}
