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
            'descriptionEn1' => 'required',
            'descriptionAr1' => 'required',
            'descriptionEn2' => 'nullable',
            'descriptionAr2' => 'nullable',
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
            'descriptionEn1' => $this->descriptionEn1,
            'descriptionAr1' => $this->descriptionAr1,
            'descriptionEn2' => $this->descriptionEn2,
            'descriptionAr2' => $this->descriptionAr2,
            'icon' => $this->icon,
            'featured' => $this->featured,
            'image' => $this->getImagePath(),
        ]);
    }
}
