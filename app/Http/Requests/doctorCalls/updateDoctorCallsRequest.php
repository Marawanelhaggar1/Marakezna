<?php

namespace App\Http\Requests\doctorCalls;

use App\Models\DoctorCalls;
use Illuminate\Foundation\Http\FormRequest;

class updateDoctorCallsRequest extends FormRequest
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
            'id' => 'required|exists:doctor_calls,id',
            'doctor_id' => 'required|exists:doctors,id'
        ];
    }

    public function updateDoctorCall()
    {

        $call = DoctorCalls::findOrFail($this->id);
        $user = auth()->user();
        $call->update([
            'user_id' => $user->id,
            'doctor_id' => $this->doctor_id,
        ]);

        return $call;
    }
}
