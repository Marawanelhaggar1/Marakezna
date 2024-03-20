<?php

namespace App\Http\Requests\WebSetting;

use App\Models\WebSetting;
use Illuminate\Foundation\Http\FormRequest;

class createWebSettingRequest extends FormRequest
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
            'twitter' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footerLogo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function getLogoPath(): string
    {
        return $this->file('logo')->store('setting_images', 'public');
    }

    public function getFooterLogoPath(): string
    {
        return $this->file('footerLogo')->store('setting_images', 'public');
    }

    public function getFaviconPath(): string
    {
        return $this->file('favicon')->store('setting_images', 'public');
    }

    public function createWebSetting(): WebSetting
    {
        return WebSetting::create([
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
    }
}
