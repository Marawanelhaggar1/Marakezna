<?php

namespace App\Http\Requests\centerCalls;

use App\Models\CenterCalls;
use App\Models\User;
use App\Notifications\Calls;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Notification;

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
            'center_id' => 'required|exists:health_centers,id',
            'doctor_id' => 'nullable|exists:doctors,id',
            'service_id' => 'nullable|exists:service_groups,id'
        ];
    }

    public function createCall(): CenterCalls
    {

        $user = auth()->user();
        $center = CenterCalls::create([
            'user_id' => $user->id,
            'center_id' => $this->center_id,
            'doctor_id' => $this->doctor_id, 'service_id' => $this->service_id,

        ]);
        $users = User::where('role', 'admin')->get();
        $call_id = $center->id;
        Notification::send($users, new Calls($call_id));
        return $center;
    }
}
