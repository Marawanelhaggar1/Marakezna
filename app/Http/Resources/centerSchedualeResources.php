<?php

namespace App\Http\Resources;

use App\Models\HealthCenter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class centerSchedualeResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $center = HealthCenter::findOrFail($this->center_id);

        dd($this);
        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'date' => $this->dateAr,
                'start_time' => $this->start_timeAr,
                'end_time' => $this->end_timeAr,
                'center' => [
                    'id' => $this->id,
                    'name' => $this->nameAr,
                ]
            ];
        } else {
            return [
                'id' => $this->id,
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'center' => [
                    'id' => $this->id,
                    'name' => $this->nameEn,
                ]
            ];
        }
    }
}
