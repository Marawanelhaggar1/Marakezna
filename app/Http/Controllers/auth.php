<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\loginRequest;
use App\Http\Requests\auth\registerRequest;
use Illuminate\Http\Request;

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
}
