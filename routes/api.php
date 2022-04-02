<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\Profilecontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
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

//DashboardController route
Route::post('/dashboard',[DashboardController::class,'allData']);

//PostController Route
//Route::get('/allPost',[PostController::class,'allPost']);
Route::put('/updatepost',[PostController::class,'updatePost']);
Route::delete('/deletepost',[PostController::class,'deletePost']);
Route::post('/userpost',[PostController::class,'userPost']);
Route::post('/addpost',[PostController::class,'addPost']);
Route::get('/postlike/{id}',[PostController::class,'postLike']);

//LikeController route
//Route::post('/userlike',[LikeController::class,'userlike']);
Route::post('/addlike',[LikeController::class,'addlike']);

//CommentController route
Route::post('/add-comment',[CommentController::class,'addcomment']);
Route::get('/postcomment',[CommentController::class,'postComment']);
Route::put('/updatecomment',[CommentController::class,'update']);
Route::delete('/deleteComment',[CommentController::class,'deleteComment']);