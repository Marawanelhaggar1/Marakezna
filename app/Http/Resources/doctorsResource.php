<?php

namespace App\Http\Resources;

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
        $specialization = Specialization::find($this->specialization_id);
        if ($healthCenter) {
            $healthCenter_nameEn = $healthCenter->name;
            $healthCenter_nameAr = $healthCenter->الاسم;
            $healthCenter_id = $healthCenter->id;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'specialization'  => [
                'id' => $specialization->id,
                'specialization' => $specialization->specialization,
                'التخصص' => $specialization->التخصص
            ],
            'fee' => $this->fee,
            'address' => $this->address,
            'title' => $this->title,
            'schedule' => $this->schedule,
            'الجدول' => $this->الجدول,
            'العنوان' => $this->العنوان,
            'اللقب' => $this->اللقب,
            'working_hours' => $this->working_hours,
            'ساعات_العمل' => $this->ساعات_العمل,
            'image' => $this->image,
            'health_center' => [
                'id' => $healthCenter_id,
                'nameEn' => $healthCenter_nameEn,
                'nameAr' => $healthCenter_nameAr,
            ]
        ];
    }
}
