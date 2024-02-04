<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Str;

use App\Http\Requests\auth\changePassword;
use App\Http\Requests\auth\loginRequest;
use App\Http\Requests\auth\registerRequest;
use App\Http\Requests\auth\updateProfile;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use App\Mail\ResetPasswordMail;

use function Laravel\Prompts\password;

class auth extends Controller
{
    // use SendsPasswordResetEmails;

    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function register(registerRequest $request)
    {
        $user = $request->registerUser();
        return response()->json([
            'success' => true,
            'message' => 'Successfully registered',
            'data' => $user
        ], 201);
    }

    public function login(loginRequest $request)
    {
        $user = $request->loginUser();
        return response()->json([
            'success' => true,
            'message' => 'Successfully logged in',
            'data' => $user
        ]);
    }


    public function updateProfile(updateProfile $request)
    {
        $user = auth()->user();

        try {
            $updatedUser = $request->updateUserProfile($user);
            return response()->json($updatedUser, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function changePassword(changePassword $request)
    {
        $user = $request->changePassword();
        return response()->json([
            'success' => true,
            'message' => 'password changed Successfully',
        ]);
    }

    // public function forgotPassword(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //     ]);

    //     $user = User::where('email', $request->email)->first();

    //     if (!$user) {
    //         return response()->json(['message' => 'User not found'], 404);
    //     }

    //     $token = Str::random(60);
    //     $user->password_reset_token = $token;
    //     $user->save();


    //     $resetPasswordMail = new ResetPasswordMail($user);

    //     Mail::to($user->email)->send($resetPasswordMail);


    //     return response()->json(['message' => 'Password reset email sent']);
    // }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password_reset_token' => 'required|string',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('email', $request->email)
            ->where('password_reset_token', $request->password_reset_token)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid email or token'], 422);
        }

        $user->password = bcrypt($request->password);
        $user->password_reset_token = null;
        $user->save();

        return response()->json(['message' => 'Password reset successfully']);
    }
}
