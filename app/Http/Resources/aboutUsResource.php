<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class aboutUsResource extends JsonResource
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
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'title' => $this->titleAr,
                'paragraph' => $this->paragraphAr,
                'mission' => $this->missionAr,
                'vision' => $this->visionAr,
                'values' => $this->valuesAr,
                'videoLink' => $this->videoLink,
                'created_at' => $this->created_at,

            ];
        } else {
            return [
                'id' => $this->id,
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'title' => $this->title,
                'paragraph' => $this->paragraph,
                'mission' => $this->mission,
                'vision' => $this->vision,
                'values' => $this->values,
                'videoLink' => $this->videoLink,
                'created_at' => $this->created_at,
            ];
        };
    }
}
