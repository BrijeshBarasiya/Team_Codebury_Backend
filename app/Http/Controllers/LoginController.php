<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(request $request)
    {
        $data = new User;
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
       //dd(User::select('id')->where("email","=",$request->email));
        $credentials= $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return response([
                "message" =>"Successfully Login",
                "user_id" => User::select('id')->where("email","=",$request->email)->get()
            ],200);
        }

        return response([
            "message"=>"Credential does not match"
        ],404);
    }

    
}
