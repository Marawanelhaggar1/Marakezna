<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request; // Import the correct Request class
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;


    public function showLinkRequestForm()
    {
        return view('forgetPasswordMail'); // Assuming you have a view named 'auth.passwords.email'
    }
    public function sendResetLinkEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Reset link sent successfully'], 200)
            : response()->json(['message' => 'Failed to send reset link'], 400);
        // return view('/forgetPassword');
    }
}
