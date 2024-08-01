<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::get('/',[PageController::class,'index'])->name('page.all');

Route::get('/posts',[PostController::class,'index'])->name('post.all');
Route::get('/posts/add',[PostController::class,'add'])->name('post.add');
Route::post('/posts/store',[PostController::class,'store'])->name('post.store');
Route::get('/posts/edit-post/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('/posts/update/{id}',[PostController::class,'update'])->name('post.update');
Route::get('/posts/{id}',[PostController::class,'delete'])->name('post.delete');


Route::get('/users/register',[UserController::class,'register'])->name('registerxx');
Route::post('/users/store',[UserController::class,'store'])->name('user.store');
Route::get('users/showLoginForm',[UserController::class,'showLoginForm'])->name('user.showLogin');
Route::post('/users/login',[UserController::class,'login'])->name('user.login');
