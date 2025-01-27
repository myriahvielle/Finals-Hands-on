<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function (){
Route::get('/login',[AuthController::class,'showLogIn']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);
});

Route::middleware('authenticated')->group(function (){

    Route::post('/logout',[AuthController::class,'logout']);

    Route::get('/', [PostController::class,'Home']);

    Route::get('/read/{post}', [PostController::class,'Read']);

    Route::get('/userposts/{user}', [PostController::class,'UserPosts']);

    Route::get('/showCreate', [PostController::class,'showCreate']);
    Route::post('/create', [PostController::class,'Create']);

    Route::get('/edit/{post}', [PostController::class,'Edit']);
    Route::put('/update/{post}', [PostController::class,'Update']);

    Route::delete('/delete/{post}', [PostController::class,'Delete']);
       
});