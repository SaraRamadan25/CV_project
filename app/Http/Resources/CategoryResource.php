<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'projects' => ProjectResource::collection($this->projects),
        ];
    }

}
