<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class settingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
            'nameAr' => $this->nameAr,
            'logo'
            => 'http://127.0.0.1:8000/storage/' . $this->logo,
            'mobile_background'
            => 'http://127.0.0.1:8000/storage/' . $this->mobile_background,
            'favicon'
            => 'http://127.0.0.1:8000/storage/' . $this->favicon,
            'footerLogo' =>
            'http://127.0.0.1:8000/storage/' . $this->footerLogo,
            'address' => $this->address,
            'addressAr' => $this->addressAr,
            'phone' => $this->phone,
            'phoneAr' => $this->phoneAr,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
            'x' => $this->x,
        ];
    }
}
