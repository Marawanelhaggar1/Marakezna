<?php

namespace App\Http\Requests\auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class updateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();
        // dd($user);
        // logger()->info('User Details:', ['user' => $user]);

        // Check if a user is authenticated and call isUser() if true
        return $user && $user->isUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = auth()->id();

        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'mobile' => 'required|unique:users,mobile,' . $userId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_of_birth' => 'nullable|date',
            // 'whatsApp' => 'nullable',
            // 'address' => 'nullable',
        ];
    }


    // public function getImagePath()
    // {
    //     if ($this->image) {

    //         return $this->file('image')->store('user_images', 'public');
    //     } else {
    //         return null;
    //     }
    // }

    public function updateUserProfile(User $user)
    {

        // $userId
        //     = auth()->user()->id;
        // $user = User::findOrFail($userId);
        $user->first_name = $this->input('first_name');
        $user->last_name = $this->input('last_name');
        $user->mobile = $this->input('mobile');
        // $user->image = $this->getImagePath();
        $user->whatsApp = $this->input('whatsApp') ? $this->input('whatsApp') : $user->whatsApp;
        $user->address = $this->input('address') ? $this->input('address') : $user->address;
        $user->date_of_birth = $this->input('date_of_birth') ? $this->input('date_of_birth') : $user->date_of_birth;
        $user->save();

        return $user;
    }
}
