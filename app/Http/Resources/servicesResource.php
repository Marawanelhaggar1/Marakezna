<?php

namespace App\Http\Resources;

use App\Models\Icons;
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

        if ($this->icon) {
            $icons = Icons::findOrFail($this->icon);
            $icon = 'https://pp.etqanis.com/storage/app/public/' . $icons->image;
        } else {
            $icon = null;
        }

        if ($this->image) {
            $image = 'https://pp.etqanis.com/storage/app/public/' . $this->image;
        } else {
            $image = null;
        }

        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'icon' => $icon,
                'featured' => $this->featured,
                'name' => $this->nameAr,
                'service_group' => [
                    'id' => $serviceGroup_id,
                    'name' => $serviceGroup_Ar,

                ],
                'description' => $this->descriptionAr,
                'image' => $image,
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'nameAr' => $this->nameAr,

                'featured' => $this->featured,
                'icon' => $icon,

                'service_group' => [
                    'id' => $serviceGroup_id,
                    'name' => $serviceGroup_En,
                    'nameAr' => $serviceGroup_Ar,

                ],
                'description' => $this->descriptionEn,
                'descriptionAr' => $this->descriptionAr,

                'image' => $image,
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'featured' => $this->featured,
                'icon' => $icon,
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
