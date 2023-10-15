<?php

namespace App\Http\Resources;

use App\Models\Doctors;
use App\Models\HealthCenter;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class visitsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $healthCenter = HealthCenter::findOrFail($this->health_center_id);
        $doctor = Doctors::findOrFail($this->doctor_id);
        $patient = Patients::findOrFail($this->patient_id);

        return [
            'id' => $this->id,
            'health_center' => [
                'id' => $this->health_center_id,
                'name' => $healthCenter->name,
            ],
            'doctor' => [
                'id' => $this->doctor_id,
                'name' => $doctor->name,
            ],
            'patient' => [
                'id' => $this->patient_id,
                'name' => $patient->name,
                'diagnose' => $this->diagnose
            ],
            'date' => $this->date,

        ];
    }
}
