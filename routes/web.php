<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;


Route::get('/', function () {



    return view('welcome');
});


Route::get('/view', function () {
    return view('views');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// الصفحة الرئيسية (يمكن تعديلها لاحقًا)
Route::get('/', function () {
    return view('welcome'); // أو dashboard إذا أنشأت
});

// -----------------------------------------------------------------------------
// BOOK
// -----------------------------------------------------------------------------
// CRUD كامل + البحث
Route::resource('book', BookController::class);
