<?php

namespace App\Http\Requests\servicesGroup;

use App\Models\ServiceGroup;
use Illuminate\Foundation\Http\FormRequest;

class createServicesGroupRequest extends FormRequest
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
            'nameEn' => 'required',
            'nameAr' => 'required',
            'services_id' => 'required|exists:services,id'
        ];
    }

    public function createServiceGroup(): ServiceGroup
    {
        return ServiceGroup::create([
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'services_id' => $this->services_id,
        ]);
    }
}
