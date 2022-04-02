<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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

        $credentials= $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return response([
                "message"=>"Successfully Login"
            ],200);
        }

        return response([
            "message"=>"Credential does not match"
        ],404);
    }

    
}
