<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] = $user->createToken(env('APP_NAME'))->plainTextToken;
            $token=explode('|',$success['token'])[1];
            return response()->json(['success' => $token,], 200);
//            return response()->json(['success' => 'ok'], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
