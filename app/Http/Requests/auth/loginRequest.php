<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email' =>'required|email|exists:users,email',
            'password' =>'required|string'
        ];
    }

    public function loginUser(){
        $credentials = $this->only('email', 'password');

      try{
            $auth = auth()->attempt($credentials);

            if(!$auth) throw new \Exception('invalid credentials');
            return [
                'token' => auth()->user()->createToken('auth_token')->plainTextToken,

            ];

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
