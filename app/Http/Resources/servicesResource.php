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
            $serviceGroup_En = $serviceGroup->nameEn;
            $serviceGroup_Ar = $serviceGroup->nameAr;
        }

        if ($this->image) {
            $image = 'http://127.0.0.1:8000/storage/' . $this->image;
        } else {
            $image = null;
        }

        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'name' => $this->nameAr,
                'service_group' => [
                    'id' => $serviceGroup_id,
                    'name' => $serviceGroup_Ar,
                ],
                'description' => $this->descriptionAr,
                'image' => $image,
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'service_group' => [
                    'id' => $serviceGroup_id,
                    'name' => $serviceGroup_En,
                ],
                'description' => $this->descriptionEn,
                'image' => $image,
            ];
        }
    }
}
