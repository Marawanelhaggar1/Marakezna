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
            'twitter' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footerLogo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'twitter' => $this->twitter,
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
