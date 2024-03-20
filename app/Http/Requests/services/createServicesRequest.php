<?php

namespace App\Http\Requests\services;

use App\Models\Services;
use Illuminate\Foundation\Http\FormRequest;

class createServicesRequest extends FormRequest
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
            'service_group_id' => 'nullable|exists:service_groups,id',
            'descriptionEn' => 'required',
            'descriptionAr' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'required|exists:icons,id',
            'featured' => 'nullable|boolean',

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

    public function createService(): Services
    {
        return Services::create([
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'service_group_id' => $this->service_group_id,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'icon' => $this->icon,
            'featured' => $this->featured,
            'image' => $this->getImagePath(),
        ]);
    }
}
