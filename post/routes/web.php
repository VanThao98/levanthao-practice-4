<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/' ,[PostController::class, 'index']);
Route::get('/posts/create' ,[PostController::class, 'create'])->name('post.create');
Route::post('/posts' ,[PostController::class, 'store'])->name('post.store');