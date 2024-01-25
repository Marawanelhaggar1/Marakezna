<?php

namespace App\Http\Requests\centerCalls;

use App\Models\CenterCalls;
use Illuminate\Foundation\Http\FormRequest;

class createCenterCallsRequest extends FormRequest
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
            'center_id' => 'required|exists:health_centers,id'
        ];
    }

    public function createCall(): CenterCalls
    {
        $user = auth()->user();
        return CenterCalls::create([
            'user_id' => $user->id,
            'center_id' => $this->center_id,
        ]);
    }
}
