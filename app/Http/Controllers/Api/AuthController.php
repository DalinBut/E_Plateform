<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\ApiController;
class AuthController extends ApiController
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->assignRole('user');
        // $user->attachRole($request->role_id);
        $token = $user->createToken('apiToken')->plainTextToken;
        return $this->created([
            'role' => 'This is a new user role.',    
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer'
            ]
        ], 'User registration successful');

    }
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $token = $user->createToken('apiToken')->plainTextToken;
            return $this->created([
                'user' => $user, 
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer'
                ]
            ], 'User login successfully.');
        } 
        else{ 
            return $this->errors('Unauthorized');
        } 
    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        // $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'User logout successful.'
        ]);
    }

}