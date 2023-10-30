<?php

namespace App\Http\Requests\visits;

use App\Models\Visits;
use Illuminate\Foundation\Http\FormRequest;

class updateVisitsRequest extends FormRequest
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
            'id' => 'required|exists:visits,id',
            'health_center_id' => 'required|exists:health_centers,id',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'diagnose' => 'nullable',
            'date' => 'required|date',
        ];
    }

    public function updateVisits(): Visits
    {
        $visits = Visits::findOrFail($this->id);

        $visits->update([
            'id' => $this->id,
            'health_center_id' => $this->health_center_id,
            'doctor_id' => $this->doctor_id,
            'patient_id' => $this->patient_id,
            'diagnose' => $this->diagnose,
            'date' => $this->date
        ]);

        return $visits;
    }
}
