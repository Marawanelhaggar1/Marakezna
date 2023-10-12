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
   public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

   public function handelGoogleCallback(){

       $user=Socialite::driver('google')->stateless()->user();
       $findUser = User::where('social_id', $user->id)->first();
       if($findUser){
                return response()->json([
                    'success' => true,
                    'message' =>'Successfully logged in',
                    'data' =>['token' => auth()->user()->createToken('auth_token')->plainTextToken,]
                ]);
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'password' => Hash::make('my-google')
                ]);

                 return response()->json([
                    'success' => true,
                    'message' =>'Successfully logged in',
                    'data' =>['token' => auth()->user()->createToken('auth_token')->plainTextToken,]
                ]);
                // return redirect('/home');
            }


    }

}
