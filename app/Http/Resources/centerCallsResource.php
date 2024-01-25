<?php

namespace App\Http\Resources;

use App\Models\HealthCenter;
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
        $user = User::find($this->user_id);
        $center = HealthCenter::find($this->center_id);
        return [
            'user' => ['id' => $this->user_id, 'first_name' => $user->first_name, 'last_name' => $user->last_name],

            'center' => ['id' => $this->center_id, 'name' => $center->nameEn]
        ];
    }
}
