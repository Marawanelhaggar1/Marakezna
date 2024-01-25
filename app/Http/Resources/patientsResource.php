<?php

namespace App\Http\Resources;

use App\Models\Doctors;
use App\Models\HealthCenter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class patientsResource extends JsonResource
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
        $doctor = Doctors::findOrFail($this->doctor_id);
        $healthCenter = HealthCenter::find($this->health_center_id);
        if ($healthCenter) {
            $healthCenter_nameEn = $healthCenter->nameEn;
            $healthCenter_nameAr = $healthCenter->nameAr;
            $healthCenter_id = $healthCenter->id;
        }
        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'email' => $this->email,
                'name' => $this->nameAr,
                'disease' => $this->diseaseAr,
                'address' => $this->addressAr,
                'doctor' => $doctor->nameAr,
                'health_center' => $healthCenter_nameAr,
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'disease' => $this->diseaseEn,
                'address' => $this->addressEn,
                'email' => $this->email,
                'doctor' => $doctor->nameEn,
                'health_center' => $healthCenter_nameEn,
                'nameAr' => $this->nameAr,
                'diseaseAr' => $this->diseaseAr,
                'addressAr' => $this->addressAr,
                'doctorAr' => $doctor->nameAr,
                'health_centerAr' => $healthCenter_nameAr,
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'disease' => $this->diseaseEn,
                'address' => $this->addressEn,
                'email' => $this->email,
                'doctor' => $doctor->nameEn,
                'health_center' => $healthCenter_nameEn,
            ];
        }
    }
}
