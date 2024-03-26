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
        return true;
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
            'status' => 'required',

        ];
    }

    public function updateCall(): CenterCalls
    {
        $call = CenterCalls::findOrFail($this->id);
        $call->update([
            'status' => $this->status,
        ]);

        return $call;
    }
}
