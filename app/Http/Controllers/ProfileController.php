<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function updateProfile(Request $request){
       $data=User::find($request->id)->first();
    //    dd($request);
       $data->update([
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
       if($data){
           return response([
               "message"=>"profile Updated Successfully"
           ],200);
       }else{
        return response([
            "message"=>"profile Updated not  Successfully"
        ],204);
       }

   }

   public function deleteProfile(Request $request){
      $result =  User::destroy($request->id);
      if($result){
          return response(["messsage" => "Delete Profile Successfully" ], 200) ;
      }
      else{
          return response(["messsage" =>"Delete Profile  UnSuccessfully" ], 204);
      }
   }
}
