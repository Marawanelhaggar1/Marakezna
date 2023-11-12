<?php

namespace App\Http\Requests\services;

use App\Models\Services;
use Illuminate\Foundation\Http\FormRequest;

class updateServicesRequest extends FormRequest
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
            'id' => 'required|exists:services,id',
            'name' => 'required|unique:services,name,' . $this->id,
            'الاسم' => 'required',
            'service_group_id' => 'nullable|exists:service_groups,id',
            'descriptionEn' => 'required',
            'descriptionAr' => 'required',
            'image' => 'nullable'
        ];
    }

    public function updateService(): Services
    {
        $service = Services::findOrFail($this->id);
        $service->update([
            'id' => $this->id,
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'service_group_id' => $this->service_group_id,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'image' => $this->image,

        ]);

        return $service;
    }
}
