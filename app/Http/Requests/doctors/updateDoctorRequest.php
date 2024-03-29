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
            'nameEn' => 'required|unique:doctors,nameEn,' . $this->id,
            'nameAr' => 'required|unique:doctors,nameAr,' . $this->id,
            'feeEn' => 'required',
            'feeAr' => 'required',
            'addressEn' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titleEn' => 'required',
            'titleAr' => 'required',
            'sort' =>
            'integer|nullable',
            'addressAr' => 'nullable',
            'phone' => 'nullable',
            'whatsApp' => 'nullable',
            'ratingEn' => 'nullable',
            'ratingAr' => 'nullable',
            'waiting' => 'required',
            'health_center_id' => 'required|array',  // Assuming you are passing an array of area_ids
            'health_center_id.*' => 'exists:health_centers,id',
            'specialization_id' => 'required|exists:specializations,id',
            'featured' => 'nullable|boolean',
            'appointment' => 'nullable|boolean',
            'view' => 'required',


        ];
    }

    public function getImagePath(): string
    {
        $doctor = Doctors::findOrFail($this->id);

        if ($this->hasFile('image')) {
            // Use the store() method to store the image
            return $this->file('image')->store('doctors_images', 'public');
        } else {
            return $doctor->image;
        }
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
            'sort' => $this->sort,
            'titleAr' => $this->titleAr,
            'ratingEn' => $this->ratingEn,
            'ratingAr' => $this->ratingAr,
            'waiting' => $this->waiting,
            'specialization_id' => $this->specialization_id,
            'phone' => $this->phone,
            'whatsApp' => $this->whatsApp,
            'featured' => $this->featured,
            'appointment' => $this->appointment, 'view' => $this->view,

        ]);
        $doctor->healthCenter()->sync($this->input('health_center_id'));


        return $doctor;
    }
}
