<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

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



    public function forgotpass(Request $request)
    {
        $data = new User;
        $data = User::where('email','=', $request->email)->first();
        
        if(!$data)
        {
            return response([
                "message"=>"User does not exist"
            ],404);
        }
        else{
            if($request->password==NULL)
            {
                return response([
                    "message"=>"Password can't be null",
                ],404);
            }
                $data->Update([
                    "email"=>$request->email,
                    "password"=>bcrypt($request->password)
                ]);

                if($data){
                    return response([
                        "message"=>"User password Updated successfully"
                    ],200);
                }
        }
    }

    
}
