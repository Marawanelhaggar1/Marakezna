<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class webSettingResource extends JsonResource
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
                'email' => $this->email,
                'name' => $this->nameAr,
                'phone' => $this->phoneAr,
                'address' => $this->addressAr,
                'x' => $this->x,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'http://127.0.0.1:8000/storage/' . $this->logo,
                'favicon' => 'http://127.0.0.1:8000/storage/' . $this->favicon,
                'footerLogo' => 'http://127.0.0.1:8000/storage/' . $this->footerLogo
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'email' => $this->email,
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'x' => $this->x,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'nameAr' => $this->nameAr,
                'phoneAr' => $this->phoneAr,
                'addressAr' => $this->addressAr,
                'logo' => 'http://127.0.0.1:8000/storage/' . $this->logo,
                'favicon' => 'http://127.0.0.1:8000/storage/' . $this->favicon,
                'footerLogo' => 'http://127.0.0.1:8000/storage/' . $this->footerLogo
            ];
        } else {
            return [
                'id' => $this->id,
                'email' => $this->email,
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'x' => $this->x,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'http://127.0.0.1:8000/storage/' . $this->logo,
                'favicon' => 'http://127.0.0.1:8000/storage/' . $this->favicon,
                'footerLogo' => 'http://127.0.0.1:8000/storage/' . $this->footerLogo
            ];
        }
    }
}
