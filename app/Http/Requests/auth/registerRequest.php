<?php

namespace App\Http\Requests\auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class registerRequest extends FormRequest
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'mobile' => 'nullable|unique:users,mobile,',
            'gender' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'social_id' => 'nullable',
            'role' => 'required'

        ];
    }

    public function registerUser()
    {
        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'gender' => $this->gender,
            'social_id' => $this->social_id,
            'mobile' => $this->mobile,
            'date_of_birth' => $this->date_of_birth,
            'role' => $this->role
        ]);

        return $user;
    }
}
