<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class doctorSchedualeResources extends JsonResource
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
                'date' => $this->dateAr,
                'start_time' => $this->start_timeAr,
                'end_time' => $this->end_timeAr,
                'doctor_id' => $this->doctor_id
            ];
        } else {
            return [
                'id' => $this->id,
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'doctor_id' => $this->doctor_id
            ];
        }
    }
}
