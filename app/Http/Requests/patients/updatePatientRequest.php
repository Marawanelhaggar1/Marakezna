<?php

namespace App\Http\Requests\patients;

use App\Models\Patients;
use Illuminate\Foundation\Http\FormRequest;

class updatePatientRequest extends FormRequest
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
            'id' => 'required|exists:patients,id',
            'nameEn' => 'required|unique:patients,name,' . $this->id,
            'nameAr' => 'required',
            'diseaseEn' => 'nullable',
            'diseaseAr' => 'nullable',
            'addressEn' => 'nullable',
            'addressAr' => 'nullable',
            'email' => 'nullable|email',
            'health_center_id' => 'nullable|exists:health_centers,id',
            'doctor_id' => 'required|exists:doctors,id',

        ];
    }

    public function updatePatient(): Patients
    {
        $patient = Patients::findOrFail($this->id);

        $patient->update([
            'id' => $this->id,
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'diseaseEn' => $this->diseaseEn,
            'diseaseAr' => $this->diseaseAr,
            'addressEn' => $this->addressEn,
            'addressAr' => $this->addressAr,
            'email' => $this->email,
            'doctor_id' => $this->doctor_id,
            'health_center_id' => $this->health_center_id,
        ]);

        return $patient;
    }
}
