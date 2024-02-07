<?php

namespace App\Http\Resources;

use App\Models\Icons;
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
            $icon = Icons::findOrFail($this->image);
            $image = 'http://127.0.0.1:8000/storage/' . $icon->image;
        } else {
            $image = null;
        }

        if (app()->getLocale() == 'Ar') {

            return [
                'id' => $this->id,
                'specialty' => $this->specialtyAr,
                'view' => $this->view,
                'icon' => $this->icon,
                'image' => $image,

            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'specialty' => $this->specialtyEn,
                'specialtyAr' => $this->specialtyAr,
                'view' => $this->view,
                'icon' => $this->icon,
                'image' => $image,
            ];
        } else {
            return [
                'id' => $this->id,
                'specialty' => $this->specialtyEn,
                'view' => $this->view,
                'icon' => $this->icon,
                'image' => $image,

            ];
        }
    }
}
