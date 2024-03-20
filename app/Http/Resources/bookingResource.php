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
        $healthCenter_image = null;
        $healthCenter_id = null;
        $doctor = Doctors::find($this->doctor_id);
        $doctor_image = $doctor->image;
        $healthCenter = HealthCenter::find($this->health_center_id);
        if ($healthCenter) {
            $healthCenter_nameEn = $healthCenter->nameEn;
            $healthCenter_nameAr = $healthCenter->nameAr;
            $healthCenter_id = $healthCenter->id;

            $healthCenter_image = $healthCenter->logo;
        }

        return [
            'id' => $this->id,
            'patient_name' => $this->patient_name,
            'phone' => $this->phone,
            'date' => $this->date,
            'time' => $this->time,
            'location' => $this->location,
            'email' => $this->email,
            'description' => $this->description,
            'doctor' => [
                'id' => $this->doctor_id,
                'name' => $doctor->nameEn,
                'image' => 'https://marakezna.com/storage/app/public/' . $doctor->image,
            ],
            'payment' => $this->payment,
            'health_center' => [
                'id' => $healthCenter_id,
                'nameEn' => $healthCenter_nameEn,
                'nameAr' => $healthCenter_nameAr,
                'image' => 'https://marakezna.com/storage/app/public/' . $healthCenter_image,
            ],
            'status' => $this->status,
            'user_id' => $this->user_id

        ];
    }
}
