<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;


Route::get('posts',[PostsController::class,'index']);