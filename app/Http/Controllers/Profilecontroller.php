<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\post;
use App\Models\User;
use App\Models\comment;
use Illuminate\Http\Request;

use App\Http\Controllers\dashboard;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Profilecontroller extends Controller
{
    //
    public function updatePost(Request $request,$id){
      //  dd('Hello world');
        // try{
        //     // print_r($request->all());exit;
        //     //$data =post::findOrFail($request->id);
        //    //dd('Hello wolrd');
        //     $data=post::findOrFail(1)->update($request->all());
        //     dd($data);
        //     return $data;

        // }catch(ModelNotFoundException $ex){
        //     // print_r($ex->getMessage());exit("hi");
        //     return response()->json(["message" => "Post not found."], 401);
        // }catch(\Exception $e){

        // }
       $data=post::find($id);
       $data->update([
           "image_url"=>$request->image_url,
           "caption"=>$request->caption,
           "user_id"=> $request->user_id
       ]);
       return $data;

    }
}
