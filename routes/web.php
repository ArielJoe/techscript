<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckKaprodi;
use App\Http\Middleware\CheckMO;
use App\Http\Middleware\CheckStudent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(strtolower(Auth::user()->role));
    }
    return view('/auth/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/student', function () {
    return view('/student/index');
})->middleware(CheckStudent::class);

Route::get('/admin', function () {
    return view('/admin/index');
})->middleware(CheckAdmin::class);

Route::get('/mo', function () {
    return view('/mo/index');
})->middleware(CheckMO::class);

Route::get('/kaprodi', function () {
    return view('/kaprodi/index');
})->middleware(CheckKaprodi::class);
