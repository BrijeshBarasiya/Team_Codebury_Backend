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
                'message'=>'Deleted successfully'
            ],200);
        }
        else{
            return response([
                'message'=>'Something went wrong'
            ],400);
        }
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

    public function update(Request $request)
    {
        $UpdateComment = comment::find($request->id);
        $UpdateComment->update([
            "comment" => $request->comment,
        ]);
    return $UpdateComment;

    }
    public function deleteComment(Request $request)
    {
        return comment::destroy($request->id);

    }
  
}
