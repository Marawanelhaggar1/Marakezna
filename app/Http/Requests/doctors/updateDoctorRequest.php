<?php

namespace App\Http\Requests\doctors;

use App\Models\Doctors;
use Illuminate\Foundation\Http\FormRequest;

class updateDoctorRequest extends FormRequest
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
            'id' => 'required|exists:doctors,id',
            'nameEn' =>
            'required|unique:doctors,name,' . $this->id,
            'nameAr' =>
            'required|unique:doctors,name,' . $this->id,
            'feeEn' => 'required|integer',
            'feeAr' => 'required',
            'addressEn' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titleEn' => 'required',
            'titleAr' => 'required',
            'addressAr' => 'nullable',
            'ratingEn' => 'required|integer',
            'ratingAr' => 'required',
            'waiting' => 'required',
            'health_center_id' => 'nullable|exists:health_centers,id',
            'specialization_id' => 'required|exists:specializations,id',

        ];
    }

    public function getImagePath(): string
    {
        return $this->file('image')->store('doctors_images', 'public');
    }

    public function updateDoctor(): Doctors
    {
        $doctor = Doctors::findOrFail($this->id);

        $doctor->update([
            'id' => $this->id,
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'feeAr' => $this->feeAr,
            'feeEn' => $this->feeEn,
            'addressEn' => $this->addressEn,
            'addressAr' => $this->addressAr,
            'image' => $this->getImagePath(),
            'titleEn' => $this->titleEn,
            'titleAr' => $this->titleAr,
            'ratingEn' => $this->ratingEn,
            'ratingAr' => $this->ratingAr,
            'waiting' => $this->waiting,
            'health_center_id' => $this->health_center_id,
            'specialization_id' => $this->specialization_id,
        ]);

        return $doctor;
    }
}
