<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class promotionResource extends JsonResource
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
                'image1' => $this->image1,
                'image2' => $this->image2,
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'titleAr' => $this->titleAr,
                'description' => $this->description,
                'descriptionAr' => $this->descriptionAr,
                'image1' => $this->image1,
                'image2' => $this->image2,
            ];
        } else {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                'image1' => $this->image1,
                'image2' => $this->image2,
            ];
        }
    }
}
