<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
        // App::setLocale($lang);
        return view('index');
    })->name('main');

    Route::get('/userPage', function () {
        // App::setLocale($lang);
        return view('user.index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');


// this route to get country ip adrees for auto localization
// Route::get('ip_details', [UserController::class, 'ip_details'])->name('ip_details');

require __DIR__.'/custom/auth.php'; // custom auth file including (Path: routs/custom)
require __DIR__.'/custom/errors.php'; // errors file including (Path: routs/custom)
