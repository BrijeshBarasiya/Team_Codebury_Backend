<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\Profilecontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use App\Models\post;
use App\Models\comment;
use App\Models\like;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/userpost',[dashboard::class,'userpost']);
Route::get('/postcomment/{id}',[dashboard::class,'postcomment']);
Route::get('/allPost',[dashboard::class,'allPost']);
Route::get('/postlike/{id}',[dashboard::class,'postlike']);
Route::post('/userlike',[dashboard::class,'userlike']);
Route::post('/addlike',[dashboard::class,'addlike']);
Route::post('/addpost',[dashboard::class,'addpost']);
Route::post('/addcomment',[dashboard::class,'addcomment']);
Route::put('/updatePost/{id}',[PostController::class,'updatePost']);
Route::delete('/deletePost',[PostController::class,'deletePost']);
Route::put('/updatecomment',[CommentController::class,'update']);
Route::delete('/deleteComment',[CommentController::class,'deleteComment']);