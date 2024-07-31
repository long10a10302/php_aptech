<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::get('',[PageController::class,'index'])->name('page.all');

Route::get('posts',[PostController::class,'index'])->name('post.all');
Route::get('add-post',[PostController::class,'add'])->name('post.add');
Route::post('store',[PostController::class,'store'])->name('post.store');
Route::get('edit-post/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('update/{id}',[PostController::class,'update'])->name('post.update');
Route::get('delete-post/{id}',[PostController::class,'delete'])->name('post.delete');

Route::get('users',[UserController::class,'register'])->name('user.register');
Route::post('store',[UserController::class,'store'])->name('user.store');
Route::get('users',[UserController::class,'login'])->name('user.login');
