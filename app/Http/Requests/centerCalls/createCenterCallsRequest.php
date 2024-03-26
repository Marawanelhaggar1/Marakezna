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
            'center_id' => 'required|exists:health_centers,id',
            'doctor_id' => 'nullable|exists:doctors,id',
            'service_id' => 'nullable|exists:service_groups,id'
        ];
    }

    public function createCall(): CenterCalls
    {

        if (auth()->user()) {
            $user = auth()->user();
        } else {
            $user = null;
        }
        $center = CenterCalls::create([
            'user_id' =>  $user->id,
            'status' => 'requested',
            'user_email' =>
            $this->user_email,
            'user_mobile' =>
            $this->user_mobile,
            'user_name' =>
            $this->user_name,
            'center_id' => $this->center_id,
            'doctor_id' => $this->doctor_id, 'service_id' => $this->service_id,

        ]);
        $users = User::where(function ($query) {
            $query->where('role', 'admin')
                ->orWhere('role', 'doctor');
        })->get();
        $call_id = $center->id;
        Notification::send($users, new Calls($call_id));
        return $center;
    }
}
