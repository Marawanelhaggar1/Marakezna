<?php

namespace App\Http\Resources;

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

        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'name' => $this->nameAr,
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'nameAr' => $this->nameAr,
                'name' => $this->nameEn,

            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
            ];
        }
    }
}
