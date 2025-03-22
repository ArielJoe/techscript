<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckKaprodi;
use App\Http\Middleware\CheckMO;
use App\Http\Middleware\CheckMahasiswa;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LetterMahasiswaController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(strtolower(Auth::user()->role));
    }
    return view('/auth/login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
// Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/', function () {
        return view('/mahasiswa/index');
    })->name('index');

    Route::resource('/submission', LetterMahasiswaController::class);
    // Route::get('/submission', [LetterController::class, 'index'])->name('submission.index');

    Route::prefix('letter')->name('letter.')->group(function () {
        Route::get('/skma', function () {
            return view('mahasiswa.letter.skma');
        })->name('skma');
        Route::get('/sptmk', function () {
            return view('mahasiswa.letter.sptmk');
        })->name('sptmk');
        Route::get('/skl', function () {
            return view('mahasiswa.letter.skl');
        })->name('skl');
        Route::get('/lhs', function () {
            return view('mahasiswa.letter.lhs');
        })->name('lhs');
    });
})->middleware(CheckMahasiswa::class);

Route::get('/admin', function () {
    return view('/admin/index');
})->middleware(CheckAdmin::class);

Route::get('/mo', function () {
    return view('/mo/index');
})->middleware(CheckMO::class);

Route::get('/kaprodi', function () {
    return view('/kaprodi/index');
})->middleware(CheckKaprodi::class);
