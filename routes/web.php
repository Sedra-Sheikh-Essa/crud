<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/* Route::get('/' , [PostController::class, "index"])->name("posts.index");
Route::get('/add' , [PostController::class, "create"])->name("posts.create");
Route::post('/' , [PostController::class, "store"])->name("posts.store");
Route::get('/{post}' , [PostController::class, "show"])->name("posts.show");
Route::get('/{post}/edit' , [PostController::class, "edit"])->name("posts.edit");
Route::put('/{post}/edit' , [PostController::class, "update"])->name("posts.update");
Route::delete('/{post}' , [PostController::class, "destroy"])->name("posts.destroy"); */

Route::resource('posts' , PostController::class);
