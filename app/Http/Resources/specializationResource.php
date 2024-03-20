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
            $image = 'https://marakezna.com/storage/app/public/' . $icon->image;
        } else {
            $image = null;
        }

        if (app()->getLocale() == 'Ar') {

            return [
                'id' => $this->id,
                'specialty' => $this->specialtyAr,
                'icon' => $this->icon,
                'image' => $image,                'view' => $this->view,


            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'specialtyEn' => $this->specialtyEn,
                'specialtyAr' => $this->specialtyAr,
                'icon' => $this->icon,
                'image_id' => $this->image,
                'view' => $this->view,

                'image' => $image,
            ];
        } else {
            return [
                'id' => $this->id,
                'specialty' => $this->specialtyEn,
                'icon' => $this->icon,
                'image' => $image,
                'view' => $this->view,

            ];
        }
    }
}
