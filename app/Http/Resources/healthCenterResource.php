<?php

namespace App\Http\Resources;

use App\Models\Area;
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
        $area = null;

        if ($this->area_id) {
            $area = Area::find($this->area_id);
        }

        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'name' => $this->nameAr,
                'address' => $this->addressAr,
                'area' => $area ? [
                    'id' => $area->id,
                    'name' => $area->nameAr
                ] : null,
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'description' => $this->descriptionAr,
                'description2' => $this->description2Ar,
                'scan' => $this->scan,
                'lab' => $this->lab,
                'phone' => $this->phone,
                'whatsApp' => $this->whatsApp,
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'address' => $this->address,
                'nameAr' => $this->nameAr,
                'addressAr' => $this->addressAr,
                'area' => $area ? [
                    'id' => $area->id,
                    'name' => $area->nameEn,
                    'nameAr' => $area->nameAr

                ] : null,
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'description' => $this->description,
                'scan' => $this->scan,
                'lab' => $this->lab,
                'phone' => $this->phone,
                'whatsApp' => $this->whatsApp,
                'description2' => $this->description2,
                'descriptionAr' => $this->descriptionAr,
                'description2Ar' => $this->description2Ar,
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'address' => $this->address,
                'area' => $area ? [
                    'id' => $area->id,
                    'name' => $area->nameEn
                ] : null,
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'description' => $this->description,
                'scan' => $this->scan,
                'lab' => $this->lab,
                'phone' => $this->phone,
                'whatsApp' => $this->whatsApp,
                'description2' => $this->description2,
            ];
        }
    }
}
