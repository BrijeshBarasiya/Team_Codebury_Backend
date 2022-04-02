<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\post;
use App\Models\User;
use App\Models\comment;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    //
    public function userpost(Request $req)
    {
        return User::find($req->id)->posts()->get();
    }
    public function postcomment($id)
    {
        return post::find($id)->comments()->get();
    }
    public function postlike($id)
    {
        return count(post::find($id)->likes()->get());
    }
    public function addpost(Request $request){
        $data=post::insert([
            'image_url'=>$request->image_url,
            'caption'=>$request->caption,
            'user_id'=>$request->user_id
        ]);
        if($data){
            return response([
                'message'=>'Added successfully'
            ],201);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
    }
    public function allPost(){
       // $data=post::all();
        return post::orderBy('id','desc')->get();;
    }
    public function addcomment(Request $request){
        $data=comment::insert([
            'comment'=>$request->comment,
            'post_id'=>$request->post_id,
            'user_id'=>$request->user_id
        ]);
        if($data){
            return response([
                'message'=>'Added successfully'
            ],201);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
    }
    public function addlike(Request $request)
    {
      $app = like::where('user_id', $request->user_id)->where('post_id', $request->post_id)->first();
        if (!empty($app)) {
            $data = like::where('user_id', $request->user_id)->where('post_id', $request->post_id)->delete();
            return response([
                'message' => 'like remove'
            ]);
        } else {
            $data = like::insert(['user_id' => $request->user_id,
                'post_id' => $request->post_id]);
            return response([
                'message' => 'like Added',
            ]);
        }
    }
    public function userlike(Request $request){
        return User::find($request->id)->likes()->get();
    }
}
