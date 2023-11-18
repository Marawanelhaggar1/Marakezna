<?php

namespace App\Http\Requests\settings;

use App\Models\Settings;
use Illuminate\Foundation\Http\FormRequest;

class updateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return
            auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return  [
            'id' => 'required|exists:settings,id',
            'name' => 'required|unique:settings,name,' . $this->id,
            'email' => 'required',
            'nameAr' => 'required',
            'logo' => 'required',
            'favicon' => 'required',
            'footerLogo' => 'required',
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

    public function updateSetting(): Settings
    {
        $setting = Settings::findOrFail($this->id);
        $setting->update([
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'nameAr' => $this->nameAr,
            'logo' => $this->logo,
            'favicon' => $this->favicon,
            'footerLogo' => $this->footerLogo,
            'address' => $this->address,
            'addressAr' => $this->addressAr,
            'phone' => $this->phone,
            'phoneAr' => $this->phoneAr,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
            'x' => $this->x,
        ]);

        return $setting;
    }
}
