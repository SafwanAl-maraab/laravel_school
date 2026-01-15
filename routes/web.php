<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;



use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);


Route::get('/', function () {



    return view('welcome');
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
