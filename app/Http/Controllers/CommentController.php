<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postComment(Request $request)
    {
        $data = post::find($request->id)->comments()->get();
        if($data){
            return response([
                'message'=>'success',
                'data'=>$data
            ],200);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
    }
    
    public function addComment(Request $request){
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

    public function updateComment(Request $request)
    {
        $UpdateComment = comment::find($request->id);
        $data=$UpdateComment->update([
            "comment" => $request->comment,
            
        ]);
        if($data){
            return response([
                'message'=>'Updated successfully',
                'comment_id'=>$UpdateComment->id
            ],201);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
    }
    public function deleteComment(Request $request)
    {
        $data= comment::destroy($request->id);
        if($data){
            return response([
                'message'=>'Comment deleted successfully',
         
            ],200);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }

    }
  
}
