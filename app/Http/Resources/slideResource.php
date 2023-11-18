<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class slideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'titleAr' => $this->titleAr,
            'sub_title' => $this->sub_title,
            'sub_titleAr' => $this->sub_titleAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'image' =>
            'http://127.0.0.1:8000/storage/' . $this->image,
            'imageAr' =>
            'http://127.0.0.1:8000/storage/' . $this->imageAr,
        ];
    }
}
