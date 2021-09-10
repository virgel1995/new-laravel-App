
<?php



Route::get('/401', function () {
    return view('errors.401');
})->name('401');

Route::get('/403', function () {
    return view('errors.403');
})->name('403');

Route::get('/404', function () {
    return view('errors.404');
})->name('404');

Route::get('/419', function () {
    return view('errors.419');
})->name('419');


Route::get('/500', function () {
    return view('errors.500');
})->name('500');

Route::get('/504', function () {
    return view('errors.504');
})->name('504');
