<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function updatePost(Request $request, $id)
    {

        $data = post::find($id);
        $data->update([
            "caption" => $request->caption,
        ]);
        return $data;

    }
    public function deletePost(Request $request)
    {
        return post::destroy($request->post_id);

    }
}
