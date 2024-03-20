<?php

namespace App\Http\Resources;

use App\Models\HealthCenter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class servicesGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $center = HealthCenter::find($this->center_id);

        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'name' => $this->nameAr,
                'center_id' => $this->center_id,

            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'nameAr' => $this->nameAr,
                'name' => $this->nameEn,
                'center_id' => $this->center_id,
                'center' => [
                    'id'
                    => $this->center_id,
                    'name' => $center->nameEn
                ]

            ];
        } else {
            return [
                'id' => $this->id,
                'center_id' => $this->center_id,
                'name' => $this->nameEn,
            ];
        }
    }
}
