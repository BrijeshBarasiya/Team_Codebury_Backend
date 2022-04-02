<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
