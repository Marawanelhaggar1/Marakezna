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
            'nameEn' => 'required|unique:services,name,' . $this->id,
            'nameAr' => 'required',
            'service_group_id' => 'nullable|exists:service_groups,id',
            'descriptionEn' => 'required',
            'descriptionAr' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function getImagePath()
    {
        if ($this->image) {

            return $this->file('image')->store('service_images', 'public');
        } else {
            return null;
        }
    }

    public function updateService(): Services
    {
        $service = Services::findOrFail($this->id);
        $service->update([
            'id' => $this->id,
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'service_group_id' => $this->service_group_id,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'image' => $this->getImagePath(),

        ]);

        return $service;
    }
}
