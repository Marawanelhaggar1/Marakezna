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

        $serviceGroup = [];
        $serviceGroup = ServiceGroup::where('services_id', $this->id)->get();
        $serviceGroup = servicesGroupResource::collection($serviceGroup);

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
                'service_group' => $serviceGroup,
                'description' => $this->descriptionAr1,
                'description2' => $this->descriptionAr2,
                'image' => $image,
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'nameAr' => $this->nameAr,

                'featured' => $this->featured,
                'icon' => $icon,

                'service_group' => $serviceGroup,
                'description' => $this->descriptionEn1,
                'descriptionAr' => $this->descriptionAr1,
                'description2' => $this->descriptionEn2,
                'descriptionAr2' => $this->descriptionAr2,

                'image' => $image,
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'featured' => $this->featured,
                'icon' => $icon,
                'service_group' => $serviceGroup,
                'description' => $this->descriptionEn1,
                'description2' => $this->descriptionEn2,
                'image' => $image,
            ];
        }
    }
}
