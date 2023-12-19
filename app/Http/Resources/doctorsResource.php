<?php

namespace App\Http\Resources;

use App\Models\DoctorSchedule;
use App\Models\HealthCenter;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class doctorsResource extends JsonResource
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
        $healthCenter = HealthCenter::find($this->health_center_id);
        $specialty = Specialization::find($this->specialization_id);
        if ($healthCenter) {
            $healthCenter_nameEn = $healthCenter->nameEn;
            $healthCenter_nameAr = $healthCenter->nameAr;
            $healthCenter_id = $healthCenter->id;
        }
        $doctorSchedule = [];
        $doctorSchedule = DoctorSchedule::where('doctor_id', $this->id)->get();
        $doctorSchedule = doctorSchedualeResources::collection($doctorSchedule);


        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'name' => $this->nameAr,
                'specialty'  => [
                    'id' => $specialty->id,
                    'specialty' => $specialty->specialtyAr,
                ],
                'fee' => $this->feeAr,
                'address' => $this->addressAr,
                'title' => $this->titleAr,
                'rating' => $this->ratingAr,
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'health_center' => [
                    'id' => $healthCenter_id,
                    'name' => $healthCenter_nameAr,
                ],
                'doctorSchedule' => $doctorSchedule
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'specialty'  => [
                    'id' => $specialty->id,
                    'specialty' => $specialty->specialtyEn,
                ],
                'fee' => $this->feeEn,
                'address' => $this->addressEn,
                'title' => $this->titleEn,
                'rating' => $this->ratingEn,
                'image' => 'http://127.0.0.1:8000/storage/' . $this->image,
                'health_center' => [
                    'id' => $healthCenter_id,
                    'name' => $healthCenter_nameEn,
                ],
                'doctorSchedule' => $doctorSchedule

            ];
        }
    }
}
