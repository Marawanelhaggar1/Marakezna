<?php

namespace App\Http\Requests\patients;

use App\Models\Patients;
use Illuminate\Foundation\Http\FormRequest;

class createPatientRequest extends FormRequest
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
            'name' => 'required',
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

    public function createPatient(): Patients
    {
        return Patients::create([
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'disease' => $this->disease,
            'المرض' => $this->المرض,
            'address' => $this->address,
            'email' => $this->email,
            'image' => $this->image,
            'doctor_id' => $this->doctor_id,
            'health_center_id' => $this->health_center_id,
        ]);
    }
}
