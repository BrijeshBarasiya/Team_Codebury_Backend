<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LikeController;





use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

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
Route::put('/updatepost',[PostController::class,'updatePost']);
Route::delete('/deletepost',[PostController::class,'deletePost']);
Route::post('/userpost',[PostController::class,'userPost']);
Route::post('/addpost',[PostController::class,'addPost']);
Route::get('/postlike/{id}',[PostController::class,'postLike']);

//LikeController route
Route::post('/addlike',[LikeController::class,'addLike']);

//CommentController route
Route::post('/addcomment',[CommentController::class,'addComment']);
Route::post('/postcomment',[CommentController::class,'postComment']);
Route::put('/updatecomment',[CommentController::class,'updateComment']);
Route::delete('/deletecomment',[CommentController::class,'deleteComment']);

//SearchController route
Route::get('/search/{name}',[SearchController::class,'Search']);

Route::post('/login',[LoginController::class,'login']);

Route::post('/email-checker', [RegisterController::class,"emailChecker"]);
Route::post('/email-register', [RegisterController::class,"emailverify"]);
Route::post('/update-profile', [ProfileController::class,"updateProfile"]);
Route::delete('/delete-profile', [ProfileController::class,"deleteProfile"]);