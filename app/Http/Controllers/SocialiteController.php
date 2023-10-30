<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\loginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    public function handelGoogleCallback(Request $request)
    {

        $social_id = $request->social_id;
        // $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('social_id', $social_id)->first();
        if ($findUser) {
            // dd($user);
            Auth::login($findUser);
            $response = response()->json([
                'success' => true,
                'message' => 'Successfully logged in',
                'data' => [
                    'token'
                    => auth()->user()->createToken('auth_token')->plainTextToken,
                ]
                //  ]
            ]);

            return $response;
        } else {
            $newUser = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'social_id' => $social_id,
                'password' => Hash::make('my-google')
            ]);

            Auth::login($newUser);



            $response = response()->json([
                'success' => true,
                'message' => 'Successfully logged in',
                'data' => ['token' => auth()->user()->createToken('auth_token')->plainTextToken,]
            ]);

            return $response;
        }
    }
}
