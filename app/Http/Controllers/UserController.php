<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return response()->json([
            'message' => 'User created successfuly',
        ],201);
    }

    public function update_profile(Request $request){

        $request->validate([
         'name'  => 'required',
            'email' => 'email|required',
        ]);
        $request->user('sanctum')->update(['name'=>$request->name],['email'=>$request->email]);

        return response()->json([
            'message' => ' update_profile successfuly',
        ],201);

    }

    public function profile(Request $request){

        return response()->json([
            'message' => ' update_profile successfuly',
            'user'=>new UserResource($request->user('sanctum'))
        ],201);




    }

}
