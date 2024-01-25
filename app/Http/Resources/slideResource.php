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
        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'title' => $this->titleAr,
                'sub_title' => $this->sub_titleAr,
                'description' => $this->descriptionAr,
                'image' =>
                'http://127.0.0.1:8000/storage/' . $this->imageAr,
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'sub_title' => $this->sub_title,
                'description' => $this->description,
                'image' =>
                'http://127.0.0.1:8000/storage/' . $this->image,
                'titleAr' => $this->titleAr,
                'sub_titleAr' => $this->sub_titleAr,
                'descriptionAr' => $this->descriptionAr,
                'imageAr' =>
                'http://127.0.0.1:8000/storage/' . $this->imageAr,
            ];
        } else {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'sub_title' => $this->sub_title,
                'description' => $this->description,
                'image' =>
                'http://127.0.0.1:8000/storage/' . $this->image,
            ];
        }
    }
}
