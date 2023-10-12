<?php

namespace App\Http\Controllers;

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
                Auth::login($findUser);
                return response()->json($findUser);
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'password' => Hash::make('my-google')
                ]);
              return  Auth::login($newUser);
                // return redirect('/home');
            }


    }

}
