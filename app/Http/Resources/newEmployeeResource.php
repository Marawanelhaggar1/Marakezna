<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class newEmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'title' => $this->titleAr,
                'name' => $this->nameAr,
                'image' => $this->image
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'titleAr' => $this->titleAr,
                'name' => $this->name,
                'nameAr' => $this->nameAr,
                'image' => $this->image
            ];
        } else {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'name' => $this->name,
                'image' => $this->image
            ];
        }
    }
}
