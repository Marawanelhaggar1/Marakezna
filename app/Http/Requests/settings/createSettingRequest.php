<?php

namespace App\Http\Requests\settings;

use App\Models\Settings;
use Illuminate\Foundation\Http\FormRequest;

class createSettingRequest extends FormRequest
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mobile_background' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footerLogo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable',
            'addressAr' => 'nullable',
            'phone' => 'required',
            'phoneAr' => 'required',
            'linkedin' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'x' => 'nullable',
        ];
    }

    public function getLogoPath(): string
    {
        return $this->file('logo')->store('setting_images', 'public');
    }

    public function getMobilePath(): string
    {
        return $this->file('mobile_background')->store('setting_images', 'public');
    }

    public function getFaviconPath(): string
    {
        return $this->file('favicon')->store('setting_images', 'public');
    }

    public function getFooterLogoPath(): string
    {
        return $this->file('footerLogo')->store('setting_images', 'public');
    }

    public function createSetting(): Settings
    {
        return Settings::create([
            'email' => $this->email,
            'name' => $this->name,
            'nameAr' => $this->nameAr,
            'logo' => $this->getLogoPath(),
            'favicon' => $this->getFaviconPath(),
            'footerLogo' => $this->getFooterLogoPath(),
            'mobile_background' => $this->getMobilePath(),
            'address' => $this->address,
            'addressAr' => $this->addressAr,
            'phone' => $this->phone,
            'phoneAr' => $this->phoneAr,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
            'x' => $this->x,
        ]);
    }
}
