<?php

namespace App\Http\Requests\doctors;

use App\Models\Doctors;
use Illuminate\Foundation\Http\FormRequest;

class createDoctorRequest extends FormRequest
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
            'feeEn' => 'required',
            'feeAr' => 'required',
            'addressEn' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titleEn' => 'required',
            'titleAr' => 'required',
            'addressAr' => 'nullable',
            'waiting' => 'required',
            'sort' =>
            'integer|nullable',
            'ratingEn' => 'required',
            'ratingAr' => 'required',
            'health_center_id' => 'required|array',  // Assuming you are passing an array of area_ids
            'health_center_id.*' => 'exists:health_centers,id',
            'specialization_id' => 'required|exists:specializations,id',
            'phone' => 'nullable',
            'whatsApp' => 'nullable',
            'featured' => 'nullable|boolean',
            'appointment' => 'nullable|boolean',
            'view' => 'nullable',

        ];
    }


    public function getImagePath(): string
    {
        return $this->file('image')->store('doctors_images', 'public');
    }

    public function createDoctor(): Doctors
    {


        $doctor = Doctors::create([
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
            'sort' => $this->sort,
            'waiting' => $this->waiting,
            'ratingAr' => $this->ratingAr,
            // 'health_center_id' => $this->health_center_id,
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
