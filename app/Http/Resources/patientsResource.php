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

        $doctor = Doctors::findOrFail($this->doctor_id);
        $healthCenter = HealthCenter::findOrFail($this->health_center_id);

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
            'disease'=>$this->disease,
            'المرض'=>$this->المرض,
            'address'=>$this->address,
            'email'=>$this->email,
            'doctor'=>$doctor->name,
            'health_center'=>$healthCenter->name,
        ];
    }
}
