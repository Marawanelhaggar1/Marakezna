<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\loginRequest;
use App\Http\Requests\auth\registerRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class auth extends Controller
{
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

    // public function forgetPassword(Request $request)
    // {
    //     try {
    //         $user = User::where('email', $request->email)->get();

    //         if (count($user) > 0) {
    //             $token = Str::random(40);
    //             $domain = URL::to('/');
    //             $url = $domain . '/reset-password?token=' . $token;

    //             $data['url'] = $url;
    //             $data['email'] = $request->email;
    //             $data['title'] = 'Password Reset ';
    //             $data['body'] = "please click the link below to reset your password";

    //             Mail::send('forgetPasswordMail', ['data' => $data], function ($message) use ($data) {
    //                 $message->to($data['email'])->subject($data['title']);
    //             });

    //             dd($data);
    //             PasswordReset::updateOrCreate([
    //                 ['email' => $request->email], ['email' => $request->email, 'token' => $token]
    //             ]);

    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'please check your email to reset your password',
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'user not found',
    //             ]);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage(),
    //         ]);
    //     }
    // }
}
