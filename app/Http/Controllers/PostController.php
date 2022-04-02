<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost()
    {

        return post::orderBy('id', 'desc')->get();
        
    }
    
    public function userPost(Request $req)
    { 
        
        $data = User::find($req->id)->posts()->get();
        if($data){
            return response([
                
                'data'=>$data,
                'message'=>'Success',
            ],200);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
    }
    public function addPost(Request $request){
        $data=post::insert([
            'image_url'=>$request->image_url,
            'caption'=>$request->caption,
            'user_id'=>$request->user_id
        ]);
        if($data){
            return response([
                'message'=>'Added comment successfully'
            ],201);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
    }
    public function updatePost(Request $request)
    {

        $data = post::find($request->id);
        $data->update([
            "caption" => $request->caption,
        ]);
        return $data;

    }
    
    public function deletePost(Request $request)
    {
        $data = post::destroy($request->post_id);
        if($data){
            return response([
                'message'=>'Deleted successfully'
            ],200);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
    }
    

    public function postLike($id)
    {    
        $data = count(post::find($id)->likes()->get());
        if($data){
            return response([
                'data'=>$data,
                'message'=>'Success'
            ],200);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
    }
}
