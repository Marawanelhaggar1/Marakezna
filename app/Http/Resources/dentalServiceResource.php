<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class dentalServiceResource extends JsonResource
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
                'description' => $this->descriptionAr,
                'image' => $this->image
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'titleAr' => $this->titleAr,
                'description' => $this->description,
                'descriptionAr' => $this->descriptionAr,
                'image' => $this->image
            ];
        } else {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->image
            ];
        }
    }
}
