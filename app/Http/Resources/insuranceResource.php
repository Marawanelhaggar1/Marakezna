<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class insuranceResource extends JsonResource
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
                'percentage' => $this->percentageAr,
                'image' => 'https://marakezna.com/storage/app/public/' . $this->image
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'percentage' => $this->percentage,
                'nameAr' => $this->nameAr,
                'percentageAr' => $this->percentageAr,
                'image' => 'https://marakezna.com/storage/app/public/' . $this->image
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'percentage' => $this->percentage,
                'image' => 'https://marakezna.com/storage/app/public/' . $this->image
            ];
        }
    }
}
