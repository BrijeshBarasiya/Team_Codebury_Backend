<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\like;

class DashboardController extends Controller
{
  public function allData(Request $request)
  {
    $userPost= post::orderBy('created_at', 'desc')->get();
    $userLike =User::find($request->id)->likes()->get();
    $userData=User::find($request->id);
    return response([
        'userPost'=>$userPost,
        'userLike'=>$userLike,
        'userData'=>$userData
    ],200);   
  }
}
