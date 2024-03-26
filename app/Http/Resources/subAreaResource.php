<?php

namespace App\Http\Resources;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class subAreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd('asdsada');
        $area = Area::find($this->area_id);
        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'name' => $this->nameAr,
                'area' => $area ? new AreaResource($area) : []

            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'nameAr' => $this->nameAr,
                'nameEn' => $this->nameEn,
                'area_id' => $this->area_id,
                'area' => $area ? new AreaResource($area) : []



            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->nameEn,
                'area' => $area ? new AreaResource($area) : []

            ];
        }
    }
}
