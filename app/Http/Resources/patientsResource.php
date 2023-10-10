<?php

namespace App\Http\Resources;

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
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
            'disease'=>$this->disease,
            'المرض'=>$this->المرض,
            'address'=>$this->address,
            'image'=>$this->image,
            'email'=>$this->email,
            'doctor_id'=>$this->doctor_id,
            'health_center_id'=>$this->health_center_id,
        ];
    }
}
