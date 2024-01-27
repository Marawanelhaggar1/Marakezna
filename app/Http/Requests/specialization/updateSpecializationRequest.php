<?php

namespace App\Http\Requests\specialization;

use App\Models\Specialization;
use Illuminate\Foundation\Http\FormRequest;

class updateSpecializationRequest extends FormRequest
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
            'id' => 'required|exists:specializations,id',
            'specialtyEn' => 'required|unique:specializations,specialtyEn,' . $this->id,
            'specialtyAr' => 'required',
            'icon' => 'nullable',
            'image' => 'nullable|exists:icons,id',
        ];
    }

    // public function getImagePath()
    // {
    //     if ($this->image) {

    //         return $this->file('image')->store('service_images', 'public');
    //     } else {
    //         return null;
    //     }
    // }



    public function updateSpecialization(): Specialization
    {
        $specialization = Specialization::findOrFail($this->id);
        $specialization->update([
            'id' => $this->id,
            'specialtyEn' => $this->specialtyEn,
            'specialtyAr' => $this->specialtyAr,
            'icon' => $this->icon, 'image' => $this->image,


        ]);

        return $specialization;
    }
}
