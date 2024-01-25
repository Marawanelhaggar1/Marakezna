<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class specializationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if ($this->image) {
            $image = 'http://127.0.0.1:8000/storage/' . $this->image;
        } else {
            $image = null;
        }

        if (app()->getLocale() == 'Ar') {

            return [
                'id' => $this->id,
                'specialty' => $this->specialtyAr,
                'icon' => $this->icon,
                'image' => $image,

            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'specialty' => $this->specialtyEn,
                'specialtyAr' => $this->specialtyAr,
                'icon' => $this->icon,
                'image' => $image,
            ];
        } else {
            return [
                'id' => $this->id,
                'specialty' => $this->specialtyEn,
                'icon' => $this->icon,
                'image' => $image,

            ];
        }
    }
}
