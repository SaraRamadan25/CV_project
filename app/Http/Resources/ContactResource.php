<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'title' => $this->title,
            'message' => $this->message,
        ];

    }
}
