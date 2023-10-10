<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class doctorsResource extends JsonResource
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
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
            'specialization'=>$this->specialization,
            'التخصص'=>$this->التخصص,
            'address'=>$this->address,
            'image'=>$this->image,
            'health_center_id'=>$this->health_center_id,
        ];
    }
}
