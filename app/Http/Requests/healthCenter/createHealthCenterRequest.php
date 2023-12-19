<?php

namespace App\Http\Requests\healthCenter;

use App\Models\HealthCenter;
use Illuminate\Foundation\Http\FormRequest;

class createHealthCenterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  auth()->user()->isAdmin();
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
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'addressAr' => 'required',
            'area_id' => 'required|exists:areas,id',
            'description' => 'required',
            'descriptionAr' => 'required',
        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('center_images', 'public');
    }
    public function createHealthCenter(): HealthCenter
    {
        return HealthCenter::create([
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'address' => $this->address,
            'image' => $this->getImagePath(),
            'addressAr' => $this->addressAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'area_id' => $this->area_id
        ]);
    }
}
