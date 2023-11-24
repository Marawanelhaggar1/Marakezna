<?php

namespace App\Http\Requests\specialization;

use App\Models\Specialization;
use Illuminate\Foundation\Http\FormRequest;

class createSpecializationRequest extends FormRequest
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

            'specialization' => 'required',
            'التخصص' => 'required',
            'icon' => 'nullable',
        ];
    }

    public function createSpecialization(): Specialization
    {
        return Specialization::create([
            'specialization' => $this->specialization,
            'التخصص' => $this->التخصص,
            'icon' => $this->icon
        ]);
    }
}
