<?php

namespace App\Http\Requests\healthCenter;

use App\Models\HealthCenter;
use Illuminate\Foundation\Http\FormRequest;

class updateHealthCenterRequest extends FormRequest
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
            'id' => 'required|exists:health_centers,id',
            'nameEn' => 'required|unique:health_centers,name,' . $this->id,
            'الاسم' => 'required',
            'address' => 'required',
            'image' => 'nullable',
            'addressAr' => 'required',
            'description' => 'required',
            'descriptionAr' => 'required',
            'area_id' => 'required|exists:areas,id',

        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('center_images', 'public');
    }

    public function updateHealthCenter(): HealthCenter
    {
        $health = HealthCenter::findOrFail($this->id);
        $health->update([
            'id' => $this->id,
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'address' => $this->address,
            'image' => $this->getImagePath(),
            'addressAr' => $this->addressAr,
            'description' => $this->description,
            'descriptionAr' => $this->descriptionAr,
            'area_id' => $this->area_id

        ]);

        return $health;
    }
}
