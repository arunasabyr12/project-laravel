<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Auth
{
    public function register(RegisterRequest $request)
    {

        
        $user = User::create([
            'role_id' => $request->role_id, 
            'surname' => $request->surname,  
            'name' => $request->name,  
            'patronymic' => $request->patronymic,  
            'iin' => $request->iin,  
            'phone_number' => $request->phone_number,  
            'email' => $request->email,  
            'password' => Hash::make($request->password),  
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        

        return response()->json([
            'message' => 'Registration successful',
            'user' => [
                'id' => $user->id,
                'surname' => $user->surname,
                'name' => $user->name,
                'patronymic' => $user->patronymic,
                'iin' => $user->iin,
                'phone_number' => $user->phone_number,
                'email' => $user->email,
                'role_id' => $user->role_id,
            ],
            'token' => $token,
        ], 201);
    }
}
