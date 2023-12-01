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
        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'name' => $this->nameAr,
                'address' => $this->addressAr,
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'description' => $this->descriptionAr,
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'address' => $this->address,
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'description' => $this->description,
            ];
        }
    }
}
