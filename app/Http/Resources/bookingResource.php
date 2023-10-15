<?php

namespace App\Http\Resources;

use App\Models\Doctors;
use App\Models\HealthCenter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class bookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $doctor = Doctors::findOrFail($this->doctor_id);
        $healthCenter = HealthCenter::findOrFail($this->health_center_id);

        return [
            'id' => $this->id,
            'patient_name' => $this->patient_name,
            'phone' => $this->phone,
            'date' => $this->date,
            'doctor' => $doctor->name,
            'health_center_id' => $healthCenter->name
        ];
    }
}
