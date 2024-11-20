<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function register(Request $request){
       
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed'
        ]);

        $user = User::create($fields);
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'success'=>true,
            'message'=>"User registered successfully",
            'data'=>[
                'user'=>$user,
                'token'=>$token
            ],
        ],201);
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email'=>"email|exists:users|required",
            'password'=>"required",
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response()->json([
                'success'=>false,
                'message'=>'Invalid email or password'
            ],403);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'success'=>true,
            'message'=>"Login successfully",
            'data'=>[
                'user'=>$user,
                'token'=>$token
            ],
        ],200);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Logout successfully"
        ],200);
    }
}
