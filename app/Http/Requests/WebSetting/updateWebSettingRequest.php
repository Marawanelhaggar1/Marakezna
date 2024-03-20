<?php

namespace App\Http\Requests\WebSetting;

use App\Models\WebSetting;
use Illuminate\Foundation\Http\FormRequest;

class updateWebSettingRequest extends FormRequest
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
            'id' => 'required|exists:web_settings,id',
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
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footerLogo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getLogoPath(): string
    {
        $setting = WebSetting::findOrFail($this->id);


        if ($this->hasFile('logo')) {
            // Use the store() method to store the image
            return $this->file('logo')->store('settings_images', 'public');
        } else {
            return $setting->logo;
        }
        }

    public function getFooterLogoPath(): string
    {
        $setting = WebSetting::findOrFail($this->id);


        if ($this->hasFile('footerLogo')) {
            // Use the store() method to store the image
            return $this->file('footerLogo')->store('settings_images', 'public');
        } else {
            return $setting ->footerLogo;
        }
        }

    public function getFaviconPath(): string
    {
        $setting = WebSetting::findOrFail($this->id);


        if ($this->hasFile('favicon')) {
            // Use the store() method to store the image
            return $this->file('favicon')->store('settings_images', 'public');
        } else {
            return $setting->favicon;
        }
        }


    public function updateWebSetting(): WebSetting
    {
        $setting = WebSetting::findOrFail($this->id);

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
            'favicon' => $this->getFaviconPath(),
            'footerLogo' => $this->getFooterLogoPath()
        ]);

        return $setting;
    }
}
