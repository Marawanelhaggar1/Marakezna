<?php

namespace App\Http\Resources;

use App\Models\Doctors;
use App\Models\HealthCenter;
use App\Models\ServiceGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class centerCallsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $user = $this->user_id ? User::find($this->user_id) : null;
        $center = HealthCenter::find($this->center_id);
        $doctor = $this->doctor_id ? Doctors::findOrFail($this->doctor_id) : null;
        $service = $this->service_id ? ServiceGroup::findOrFail($this->service_id) : null;

        return [
            'id' => $this->id,
            'user' => $user ? [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'whatsApp' => $user->whatsApp
            ] : [
                'first_name' => $this->user_name,
                'email' => $this->user_email,
                'mobile' => $this->user_mobile,
            ],
            'center' => $center ? [
                'id' => $center->id,
                'name' => $center->nameEn
            ] : null,
            'doctor' => [
                'id' => $doctor ? $doctor->id : null,
                'name' => $doctor ? $doctor->nameEn : null
            ],
            'service' => [
                'id' => $service ? $service->id : null,
                'name' => $service ? $service->nameEn : null
            ],
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
