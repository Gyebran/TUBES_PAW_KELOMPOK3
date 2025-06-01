<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //buat registrasi ya bray
    public function register(request $request){
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:9|confirmed',
        ]);

        $user = User::create([
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
        ]);

        //bikin token dulu ya ges
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Registrasi Berhasil!',
            'user' => $user,
            'token' => $token,
        ],201);
    }

    //nah ini buat login ges
    public function login(request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)){
            return response()->json([
                'message'=>'Email atau Password salah!',
            ], 401);
        }

        //ini buat pertokenan
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil!',
            'token' => $token,
        ], 200);
    }

    //oke ini buat logout bray
    public function logout(request $request){
        $request -> user()->currentAccessToken()->delete();

        return response()->json([
            'message'=>'Logout Berhasil'
        ]);
    }
}