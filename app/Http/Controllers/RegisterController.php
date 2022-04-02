<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
     /**
     *  Email enter  from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function emailChecker(Request $request)
    {

        
        $request->validate([
            "email" => "required|string|email|unique:users,email", 
        ]);
       
        return response("success",200);
    }

/**
     *  Email enter  from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function emailverify(Request $request)
    {
        
        $verify=$request->validate([
            "email" => "string|email|unique:users,email",    
        ]);
        
        $otp=$request->otp;
      
        if($otp==false)
        {
            return response([
                "message"=>"User not verified",
            ],406);
        }
        if($verify==true && $otp==true)
        {
            $data=User::insert([
                "fname"=>$request->fname,
                "lname"=>$request->lname,
                "email"=>$request->email,
                "password"=>bcrypt($request->password),
                "gender"=>$request->gender,
                "department"=>$request->department,
                "job"=>$request->job,
                "image_url"=>$request->image_url,
                "dob"=>$request->dob,
                
            ]);
            
            
            if($data==true)
            {
                return response([
                    "message"=>"User created successfully",
                ],201);
            }
            else{
                return response([
                    "message"=>"User Not created ",
                ],404);
            }
        }

    
     
    }
}
