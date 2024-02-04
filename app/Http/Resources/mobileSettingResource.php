<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class mobileSettingResource extends JsonResource
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
                'twitter' => $this->twitter,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'http://127.0.0.1:8000/storage/' . $this->logo,
                'background1' => 'http://127.0.0.1:8000/storage/' . $this->background1,
                'background2' => 'http://127.0.0.1:8000/storage/' . $this->footerLogo
            ];
        } else if (app()->getLocale() == 'admin') {
            return [
                'id' => $this->id,
                'email' => $this->email,
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'nameAr' => $this->nameAr,
                'phoneAr' => $this->phoneAr,
                'addressAr' => $this->addressAr,
                'twitter' => $this->twitter,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'http://127.0.0.1:8000/storage/' . $this->logo,
                'background1' => 'http://127.0.0.1:8000/storage/' . $this->background1,
                'background2' => 'http://127.0.0.1:8000/storage/' . $this->footerLogo
            ];
        } else {
            return [
                'id' => $this->id,
                'email' => $this->email,
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'twitter' => $this->twitter,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'http://127.0.0.1:8000/storage/' . $this->logo,
                'background1' => 'http://127.0.0.1:8000/storage/' . $this->background1,
                'background2' => 'http://127.0.0.1:8000/storage/' . $this->footerLogo
            ];
        }
    }
}
