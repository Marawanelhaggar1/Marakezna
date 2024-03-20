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
                'twitter' => $this->twitter,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'https://marakezna.com/storage/app/public/' . $this->logo,
                'favicon' => 'https://marakezna.com/storage/app/public/' . $this->favicon,
                'footerLogo' => 'https://marakezna.com/storage/app/public/' . $this->footerLogo
            ];
        } else if (app()->getLocale() == 'admin') {
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
                'nameAr' => $this->nameAr,
                'phoneAr' => $this->phoneAr,
                'addressAr' => $this->addressAr,
                'logo' => 'https://marakezna.com/storage/app/public/' . $this->logo,
                'favicon' => 'https://marakezna.com/storage/app/public/' . $this->favicon,
                'footerLogo' => 'https://marakezna.com/storage/app/public/' . $this->footerLogo
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
                'logo' => 'https://marakezna.com/storage/app/public/' . $this->logo,
                'favicon' => 'https://marakezna.com/storage/app/public/' . $this->favicon,
                'footerLogo' => 'https://marakezna.com/storage/app/public/' . $this->footerLogo
            ];
        }
    }
}
