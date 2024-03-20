<?php

namespace App\Http\Resources;

use App\Models\Area;
use App\Models\HealthCenter;
use App\Models\ServiceGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class healthCenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $service = ServiceGroup::where('center_id', $this->id)->get();
        $center = HealthCenter::find($this->id);
        $area = $center->areas;
        $subArea = $center->subAreas;
        // dd($area);

        $image = $this->image ? 'https://marakezna.com/storage/app/public/' . $this->image : null;
        $logo = $this->logo ? 'https://marakezna.com/storage/app/public/' . $this->logo : null;

        $description = $this->description1 ?? null;
        $description2 = $this->description2 ?? null;
        $descriptionAr = $this->description1Ar ?? null;
        $description2Ar = $this->description2Ar ?? null;

        $phone = $this->phone ?? null;
        $whatsApp = $this->whatsAppLink ?? null;
        $name = $this->nameEn ?? null;
        $nameAr = $this->nameAr ?? null;
        $address = $this->address ?? null;
        $addressAr = $this->addressAr ?? null;
        $scan = $this->scan ?? null;
        $lab = $this->lab ?? null;

        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'name' => $nameAr,
                'address' => $addressAr,
                'image' => $image,
                'logo' => $logo,
                'description' => $descriptionAr,
                'description2' => $description2Ar,
                'scan' => $scan,
                'lab' => $lab,
                'areas' => AreaResource::collection($area),
                'sub_areas' => subAreaResource::collection($subArea),
                'service' => servicesGroupResource::collection($service),
                'view' => $this->view,
                'phone' => $phone,
                'whatsApp' => $whatsApp,
            ];
        } elseif (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'name' => $name,
                'address' => $address,
                'nameAr' => $nameAr,
                'addressAr' => $addressAr,
                'areas' => AreaResource::collection($area),
                'sub_areas' => subAreaResource::collection($subArea),
                'service' => servicesGroupResource::collection($service),
                'view' => $this->view,
                'image' => $image,
                'logo' => $logo,
                'description' => $description,
                'scan' => $scan,
                'lab' => $lab,
                'phone' => $phone,
                'whatsApp' => $whatsApp,
                'description2' => $description2,
                'descriptionAr' => $descriptionAr,
                'description2Ar' => $description2Ar,
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $name,
                'address' => $address,
                'sub_areas' => subAreaResource::collection(
                    $subArea
                ),
                'areas' => AreaResource::collection($area),
                'service' => servicesGroupResource::collection($service),
                'view' => $this->view,
                'image' => $image,
                'logo' => $logo,
                'description' => $description,
                'scan' => $scan,
                'lab' => $lab,
                'phone' => $phone,
                'whatsApp' => $whatsApp,
                'description2' => $description2,
            ];
        }
    }
}
