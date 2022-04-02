<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\like;
class LikeController extends Controller
{
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
