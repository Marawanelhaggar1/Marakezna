<?php

namespace App\Http\Resources;

use App\Models\ServiceGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class servicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $serviceGroup = ServiceGroup::findOrFail($this->service_group_id);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'الاسم'=>$this->الاسم,
            'service_group'=>$serviceGroup->name,
        ];
    }
}
