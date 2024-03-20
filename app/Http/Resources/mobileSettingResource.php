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
                'location' => $this->location,
                'tiktok' => $this->tiktok,
                'whatsAppLink' => $this->whatsAppLink,
                'whatsApp' => $this->whatsApp,
                'snapchat' => $this->snapchat,
                'youtube' => $this->youtube,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'https://marakezna.com/storage/app/public/' . $this->logo,
                'background1' => 'https://marakezna.com/storage/app/public/' . $this->background1,
                'background2' => 'https://marakezna.com/storage/app/public/' . $this->background2
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
                'location' => $this->location,
                'tiktok' => $this->tiktok,
                'whatsAppLink' => $this->whatsAppLink,
                'whatsApp' => $this->whatsApp,
                'snapchat' => $this->snapchat,
                'youtube' => $this->youtube,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'https://marakezna.com/storage/app/public/' . $this->logo,
                'background1' => 'https://marakezna.com/storage/app/public/' . $this->background1,
                'background2' => 'https://marakezna.com/storage/app/public/' . $this->background2
            ];
        } else {
            return [
                'id' => $this->id,
                'email' => $this->email,
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'location' => $this->location,
                'tiktok' => $this->tiktok,
                'whatsAppLink' => $this->whatsAppLink,
                'whatsApp' => $this->whatsApp,
                'snapchat' => $this->snapchat,
                'youtube' => $this->youtube,
                'facebook' => $this->facebook,
                'linkedin' => $this->linkedin,
                'instagram' => $this->instagram,
                'logo' => 'https://marakezna.com/storage/app/public/' . $this->logo,
                'background1' => 'https://marakezna.com/storage/app/public/' . $this->background1,
                'background2' => 'https://marakezna.com/storage/app/public/' . $this->background2
            ];
        }
    }}
