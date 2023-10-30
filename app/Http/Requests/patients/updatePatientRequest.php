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
            'name' => 'required|unique:patients,name,' . $this->id,
            'الاسم' => 'required',
            'disease' => 'nullable',
            'المرض' => 'nullable',
            'address' => 'required',
            'image' => 'nullable',

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
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'disease' => $this->disease,
            'المرض' => $this->المرض,
            'image' => $this->image,
            'address' => $this->address,
            'email' => $this->email,
            'doctor_id' => $this->doctor_id,
            'health_center_id' => $this->health_center_id,
        ]);

        return $patient;
    }
}
