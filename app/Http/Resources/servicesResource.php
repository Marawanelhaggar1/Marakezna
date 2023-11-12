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
        $serviceGroup_id = null;
        $serviceGroup_En = null;
        $serviceGroup_Ar = null;
        $serviceGroup = ServiceGroup::find($this->service_group_id);
        if ($serviceGroup) {
            $serviceGroup_id = $serviceGroup->id;
            $serviceGroup_En = $serviceGroup->name;
            $serviceGroup_Ar = $serviceGroup->الاسم;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'service_group' => [
                'id' => $serviceGroup_id,
                'nameEn' => $serviceGroup_En,
                'nameAr' => $serviceGroup_Ar,
            ],
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'image' => $this->image,
        ];
    }
}
