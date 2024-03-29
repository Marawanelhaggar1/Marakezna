<?php

namespace App\Http\Requests\mobileSetting;

use App\Models\MobileSetting;
use Illuminate\Foundation\Http\FormRequest;

class createMobileSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required',
            'name' => 'required',
            'nameAr' => 'required',
            'phone' => 'required',
            'phoneAr' => 'required',
            'address' => 'nullable',
            'addressAr' => 'nullable',
		'linkedin' => 'nullable',
            'tiktok' => 'nullable',
            'location' => 'nullable',
            'whatsAppLink' => 'nullable',
            'snapchat' => 'nullable',
            'youtube' => 'nullable',
            'whatsApp' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getLogoPath(): string
    {
        return $this->file('logo')->store('setting_images', 'public');
    }

    public function getBackground1Path(): string
    {
        return $this->file('background1')->store('setting_images', 'public');
    }

    public function getBackground2Path(): string
    {
        return $this->file('background2')->store('setting_images', 'public');
    }

    public function createMobileSetting(): MobileSetting
    {
        return MobileSetting::create([
            'email' => $this->email,
            'name' => $this->name,
            'nameAr' => $this->nameAr,
            'phone' => $this->phone,
            'phoneAr' => $this->phoneAr,
            'address' => $this->address,
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
            'logo' => $this->getLogoPath(),
            'background1' => $this->getBackground1Path(),
            'background2' => $this->getBackground2Path()
        ]);
    }
}
