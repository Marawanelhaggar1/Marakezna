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
            'name' => 'required',
            'الاسم' => 'required',
            'specialization_id' => 'required|exists:specializations,id',
            'fee' => 'required',
            'address' => 'nullable',
            'image' => 'nullable',
            'health_center_id' => 'nullable|exists:health_centers,id',
            'ساعات_العمل' => 'required',
            'اللقب' => 'required',
            'title' => 'required',
            'العنوان' => 'required',
            'working_hours' => 'required',
            'schedule' => 'required',
            'الجدول' => 'required',

        ];
    }

    public function createDoctor(): Doctors
    {
        return Doctors::create([
            'name' => $this->name,
            'الاسم' => $this->الاسم,
            'specialization_id' => $this->specialization_id,
            'fee' => $this->fee,
            'address' => $this->address,
            'image' => $this->image,
            'health_center_id' => $this->health_center_id,
            'title' => $this->title,
            'schedule' => $this->schedule,
            'الجدول' => $this->الجدول,
            'العنوان' => $this->العنوان,
            'اللقب' => $this->اللقب,
            'working_hours' => $this->working_hours,
            'ساعات_العمل' => $this->ساعات_العمل,
        ]);
    }
}
