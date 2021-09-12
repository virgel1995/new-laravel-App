<?php


use App\Http\Controllers\{
    UserController,
    MessagesController
};

Route::get('/privtechat/{id}', [MessagesController::class, 'index'] )->name('user');

// UserController
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/all', [UserController::class, 'allUsers'])->name('user.all');
Route::get('/user/online', [UserController::class, 'onlineUsers'])->name('user.online');
Route::get('/user/privte', [UserController::class, 'privte'])->name('user.privte');

Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/profile/{id}', [UserController::class, 'show'])->name('user.show');
// update Profile
Route::post('/user/update-bio', [UserController::class, 'updateUserBio'])->name('user.updateBio');
Route::post('/user/updateUserUsername', [UserController::class, 'updateUserUsername'])->name('user.updateUsername');
Route::post('/user/updateUserPassword', [UserController::class, 'updateUserPassword'])->name('user.updatePassword');
Route::post('/user/updateUserEmail', [UserController::class, 'updateUserEmail'])->name('user.updateEmail');
Route::post('/user/updateUserAvatar', [UserController::class, 'updateUserAvatar'])->name('user.updateAvatar');
Route::post('/user/updateUserCountry', [UserController::class, 'updateUserCountry'])->name('user.updateUserCountry');
