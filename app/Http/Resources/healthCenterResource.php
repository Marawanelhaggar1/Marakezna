<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class healthCenterResource extends JsonResource
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
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'address' => $this->address,
            'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
            'addressAr' => $this->addressAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr

        ];
    }
}
