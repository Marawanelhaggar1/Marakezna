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
                'image' => $this->image,
                'paragraph1' => $this->paragraph1Ar,
                'paragraph2' => $this->paragraph2Ar,
            ];
        } else {
            return [
                'id' => $this->id,
                'image' => $this->image,
                'paragraph1' => $this->paragraph1,
                'paragraph2' => $this->paragraph2,
            ];
        };
    }
}
