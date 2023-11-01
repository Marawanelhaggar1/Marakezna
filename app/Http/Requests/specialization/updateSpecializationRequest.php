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
            'specialization' => 'required|unique:service_groups,name,' . $this->id,
            'التخصص' => 'required'
        ];
    }

    public function updateSpecialization(): Specialization
    {
        $specialization = Specialization::findOrFail($this->id);
        $specialization->update([
            'id' => $this->id,
            'specialization' => $this->specialization,
            'التخصص' => $this->التخصص,
        ]);

        return $specialization;
    }
}
