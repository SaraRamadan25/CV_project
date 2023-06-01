<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'type'=>$this->type,
            'image'=>$this->image,
            'category' => $this->category->name,
            'user' => $this->user->name,
        ];
    }
}
