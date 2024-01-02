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
        $healthCenter_nameEn = null;
        $healthCenter_nameAr = null;
        $healthCenter_id = null;
        $doctor = Doctors::find($this->doctor_id);
        $healthCenter = HealthCenter::find($this->health_center_id);
        if ($healthCenter) {
            $healthCenter_nameEn = $healthCenter->nameEn;
            $healthCenter_nameAr = $healthCenter->nameAr;
            $healthCenter_id = $healthCenter->id;
        }

        return [
            'id' => $this->id,
            'patient_name' => $this->patient_name,
            'phone' => $this->phone,
            'date' => $this->date,
            'location' => $this->location,
            'email' => $this->email,
            'description' => $this->description,
            'doctor' => [
                'id' => $this->doctor_id,
                'name' => $doctor->nameEn,
            ],
            'payment' => $this->payment,
            'health_center' => [
                'id' => $healthCenter_id,
                'nameEn' => $healthCenter_nameEn,
                'nameAr' => $healthCenter_nameAr,
            ],
            'status' => $this->status
        ];
    }
}
