<?php

namespace App\Http\Resources;

use App\Models\Doctors;
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
        // $healthCenter_nameEn = null;
        // $healthCenter_nameAr = null;
        // $healthCenter_id = null;
        // $healthCenter = HealthCenter::find($this->health_center_id);
        $specialty = Specialization::find($this->specialization_id);
        // if ($health_ce) {
        //     $healthCenter_nameEn = $healthCenter->nameEn;
        //     $healthCenter_nameAr = $healthCenter->nameAr;
        //     $healthCenter_id = $healthCenter->id;
        // }
        $doctor = Doctors::find($this->id);
        $center = $doctor->healthCenter;
        $doctorSchedule = [];
        $doctorSchedule = DoctorSchedule::where('doctor_id', $this->id)->get();
        $doctorSchedule = doctorSchedualeResources::collection($doctorSchedule);



        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'waiting' => $this->waiting,
                'name' => $this->nameAr,

                'specialty'  => [
                    'id' => $specialty->id,
                    'specialty' => $specialty->specialtyAr,
                ],
                'fee' => $this->feeAr,
                'phone' => $this->phone,
                'whatsApp' => $this->whatsApp,
                'address' => $this->addressAr,
                'title' => $this->titleAr,
                'view' => $this->view,
                'rating' => $this->ratingAr,
                'featured' => $this->featured,
                'appointment' => $this->appointment,
                'image' => 'https://marakezna.com/storage/app/public/' . $this->image,
                'health_center' => healthCenterResource::collection($center),
                'doctorSchedule' => $doctorSchedule
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'waiting' => $this->waiting,
                'nameAr' => $this->nameAr,
                'name' => $this->nameEn,
                'specialty'  => [
                    'id' => $specialty->id,
                    'specialtyAr' => $specialty->specialtyAr,
                    'specialty' => $specialty->specialtyEn,
                ],
                'feeAr' => $this->feeAr,
                'fee' => $this->feeEn,
                'phone' => $this->phone,
                'whatsApp' => $this->whatsApp,
                'addressAr' => $this->addressAr,
                'titleAr' => $this->titleAr,
                'ratingAr' => $this->ratingAr,
                'address' => $this->addressEn,
                'title' => $this->titleEn,
                'rating' => $this->ratingEn,
                'view' => $this->view,
                'featured' => $this->featured,
                'appointment' => $this->appointment,
                'image' => 'https://marakezna.com/storage/app/public/' . $this->image,
                'health_center' => healthCenterResource::collection($center),

                'doctorScheduleAr' => $doctorSchedule,
                'doctorSchedule' => $doctorSchedule


            ];
        } else {
            return [
                'id' => $this->id,
                'waiting' => $this->waiting,
                'name' => $this->nameEn,
                'specialty'  => [
                    'id' => $specialty->id,
                    'specialty' => $specialty->specialtyEn,

                ],
                'fee' => $this->feeEn,
                'address' => $this->addressEn,
                'title' => $this->titleEn,
                'rating' => $this->ratingEn,
                'view' => $this->view,
                'phone' => $this->phone,
                'featured' => $this->featured,
                'appointment' => $this->appointment,
                'whatsApp' => $this->whatsApp,
                'image' => 'https://marakezna.com/storage/app/public/' . $this->image,
                'health_center' => healthCenterResource::collection($center),
                'doctorSchedule' => $doctorSchedule

            ];
        }
    }
}
