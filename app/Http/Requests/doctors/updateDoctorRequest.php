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
            'name' => 'required|unique:doctors,name,' . $this->id,
            'الاسم' => 'required',
            'specialization' => 'required',
            'التخصص' => 'required',
            'address' => 'nullable',
            'image' => 'nullable',
            'health_center_id' => 'nullable|exists:health_centers,id',

        ];
    }

    public function updateDoctor(): Doctors
    {
        $doctor = Doctors::findOrFail($this->id);

        $doctor->update([
            'id' => $this->id,
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'specialization' => $this->specialization,
            'التخصص' => $this->التخصص,
            'address' => $this->address,
            'image' => $this->image,
            'health_center_id' => $this->health_center_id,
        ]);

        return $doctor;
    }
}
