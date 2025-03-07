<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // public function delete($id)
    // {
    //     $user = User::find($id);

    //     if (!$user) {
    //         return response()->json(['message' => 'User cannot be found'], 404);
    //     }

    //     $user->delete();

    //     return response()->json(['message' => 'deleted']);
    // }

    public function all()
    {
        //dd(123);
        $users = User::all();
        return response()->json($users);
    }

    public function users()
    {
        $users = User::where('role', 'user')->get();
        return response()->json($users);
    }

    public function userinfo(Request $request)
    {
        return response()->json($request->user());
    }
}

