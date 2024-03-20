<?php

namespace App\Http\Requests\centerCalls;

use App\Models\CenterCalls;
use Illuminate\Foundation\Http\FormRequest;

class updateCenterCallsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return
            auth()->user()->isUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:center_calls,id',
            'center_id' => 'required|exists:health_centers,id',
            'doctor_id' => 'nullable|exists:doctors,id',
            'service_id' => 'nullable|exists:service_groups,id'

        ];
    }

    public function updateCall(): CenterCalls
    {
        $call = CenterCalls::findOrFail($this->id);
        $call->update([
            'center_id' => $this->center_id,
            'doctor_id' => $this->doctor_id,
            'service_id' => $this->service_id,
        ]);

        return $call;
    }
}
