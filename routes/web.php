<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    HomeController,
    PostController,
    CommentController
};

Route::get('/', function () {
        // App::setLocale($lang);
        return view('index');
    })->name('main');

    Route::get('/userPage', function () {
        // App::setLocale($lang);
        return view('user.index');
    });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');


// this route to get country ip adrees for auto localization
// Route::get('ip_details', [UserController::class, 'ip_details'])->name('ip_details');

require __DIR__.'/custom/auth.php'; // custom auth file including (Path: routs/custom/auth)
require __DIR__.'/custom/errors.php'; // errors file including (Path: routs/custom/errors)
require __DIR__.'/custom/profile.php'; // profile file including (Path: routs/custom/profile)


// Route::get('post',  [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::get('/article/{post:slug}',  [PostController::class, 'show'])->name('post.show');
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
