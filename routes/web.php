<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/* Route::get('/' , [PostController::class, "index"])->name("posts.index");
Route::get('/add' , [PostController::class, "create"])->name("posts.create");
Route::post('/' , [PostController::class, "store"])->name("posts.store");
Route::get('/{post}' , [PostController::class, "show"])->name("posts.show");
Route::get('/{post}/edit' , [PostController::class, "edit"])->name("posts.edit");
Route::put('/{post}/edit' , [PostController::class, "update"])->name("posts.update");
Route::delete('/{post}' , [PostController::class, "destroy"])->name("posts.destroy"); */

Route::get('/' , [AuthController::class , "showLoginForm"])->name("login");
Route::post('/' , [AuthController::class , "login"]);
/* Route::middleware("guest")->group(
    function(){
        Route::get('/' , [AuthController::class , "showLoginForm"])->name("login");
        Route::post('/' , [AuthController::class , "login"]);
    }
); */
Route::middleware("auth")->group(
    function(){
        Route::post('/logout' , [AuthController::class , "logout"])->name("logout");
        Route::resource('posts' , PostController::class);
        Route::resource('users' , UserController::class);
        //Route::delete('/deleteAllPosts' , [UserController::class , "destroyAllPost"])->name("users.destroyAllPost");


/*         Route::get('/create' , [UserController::class, "create"])->name("users.create");
        Route::post('/' , [UserController::class, "store"])->name("users.store");
        Route::get('/{user}/edit' , [UserController::class, "edit"])->name("users.edit");
        Route::put('/{user}' , [UserController::class, "update"])->name("users.update");
        Route::delete('/{user}' , [UserController::class, "destroy"])->name("users.destroy"); */

    }
);
