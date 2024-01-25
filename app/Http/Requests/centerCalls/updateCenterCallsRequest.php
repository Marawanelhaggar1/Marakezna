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
            'center_id' => 'required|exists:health_centers,id'
        ];
    }

    public function updateCall(): CenterCalls
    {
        $call = CenterCalls::findOrFail($this->id);
        $user = auth()->user();
        $call->update([
            'user_id' => $user->id,
            'center_id' => $this->center_id,
        ]);

        return $call;
    }
}
