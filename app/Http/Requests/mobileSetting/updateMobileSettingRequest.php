<?php

namespace App\Http\Requests\mobileSetting;

use App\Models\MobileSetting;
use Illuminate\Foundation\Http\FormRequest;

class updateMobileSettingRequest extends FormRequest
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
            'id' => 'required|exists:mobile_settings,id',
            'email' => 'required',
            'name' => 'required',
            'nameAr' => 'required',
            'phone' => 'required',
            'phoneAr' => 'required',
            'address' => 'nullable',
            'addressAr' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
		'linkedin' => 'nullable',
            'tiktok' => 'nullable',
            'location' => 'nullable',
            'whatsAppLink' => 'nullable',
            'snapchat' => 'nullable',
            'youtube' => 'nullable',
            'whatsApp' => 'nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getLogoPath(): string
    {
        $setting = MobileSetting::findOrFail($this->id);

	if ($this->hasFile('logo')) {
            // Use the store() method to store the image
            return $this->file('logo')->store('settings_images', 'public');
        } else {
            return $setting->logo;
        }
    }

    public function getBackground1Path(): string
    {
        $setting = MobileSetting::findOrFail($this->id);

	if ($this->hasFile('background1')) {
            // Use the store() method to store the image
            return $this->file('background1')->store('settings_images', 'public');
        } else {
            return $setting->background1;
        }
    }

    public function getBackground2Path(): string
    {
        $setting = MobileSetting::findOrFail($this->id);

	if ($this->hasFile('background2')) {
            // Use the store() method to store the image
            return $this->file('background2')->store('settings_images', 'public');
        } else {
            return $setting->background2;
        }
    }

    public function updateMobileSetting(): MobileSetting
    {
        $setting = MobileSetting::findOrFail($this->id);

        $setting->update([
            'id' => $this->id,
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

        return $setting;
    }
}
