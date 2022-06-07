<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {

        $validated = $request->validated();

        User::creating(function ($user){
            $user->password = bcrypt($user->password);
        });
        $user = User::create($validated);


        return response()->json([
            'message' => 'User created successfuly',
            'data' => new UserResource($user),
            'token' => $user ->createToken('MyApp')->plainTextToken,
        ],201);

    }


    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' =>'required',
            'password' => 'required',
        ]);

        $user = User::where('email',$validated['email'])->first;

        if (!$user){
            return response()->json([
                'message' => 'User not found',
            ],404);
        }

        if (!Has::check ($validated['password'], $user ->password)){
            return response()->json([
                'message' => 'Password is incorrect',
            ], 401);
        }

        return response()->json([
            'message' => 'User created successfuly',
            'data' => new UserResource($user),
            'token' => $user ->createToken('MyApp')->plainTextToken,
        ],201);

    }

}
