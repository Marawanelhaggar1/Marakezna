<?php

namespace App\Http\Requests\doctorCalls;

use App\Models\DoctorCalls;
use Illuminate\Foundation\Http\FormRequest;

class createDoctorCallsRequest extends FormRequest
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
            'doctor_id' => 'required',
        ];
    }

    public function RequestACall()
    {
        $user = auth()->user();
        return DoctorCalls::create([
            'user_id' => $user->id,
            'doctor_id' => $this->doctor_id,
        ]);
    }
}
