<?php

namespace App\Http\Resources;

use App\Models\Doctors;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class doctorCallsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array

    {
        $user = User::find($this->user_id);
        $doctor = Doctors::find($this->doctor_id);
        return [
            'user' => ['id' => $this->user_id, 'first_name' => $user->first_name, 'last_name' => $user->last_name],

            'doctor' => ['id' => $this->doctor_id, 'name' => $doctor->nameEn],
            'created_at' => $this->created_at,
        ];
    }
}
