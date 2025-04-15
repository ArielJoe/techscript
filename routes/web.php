<?php

<<<<<<< HEAD
use App\Http\Controllers\AdminKaprodiController;
use App\Http\Controllers\AdminMahasiswaController;
use App\Http\Controllers\AdminMoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaprodiHistoryController;
use App\Http\Controllers\KaprodiSubmissionController;
use App\Http\Controllers\LetterLhsMahasiswaController;
use App\Http\Controllers\LetterSklMahasiswaController;
use App\Http\Controllers\LetterSkmaMahasiswaController;
use App\Http\Controllers\LetterSptmkMahasiswaController;
use App\Http\Controllers\MOHistoryController;
use App\Http\Controllers\MOSubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
=======
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckKaprodi;
use App\Http\Middleware\CheckMO;
use App\Http\Middleware\CheckMahasiswa;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\LetterSkmaMahasiswaController;
use App\Http\Controllers\LetterSptmkMahasiswaController;
use App\Http\Controllers\LetterLhsMahasiswaController;
use App\Http\Controllers\LetterSklMahasiswaController;
use App\Enums\RoleEnum;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(RoleEnum::from(Auth::user()->role)->label());
    }
    return view('/auth/login');
});
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

<<<<<<< HEAD
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('mahasiswa')->name('mahasiswa.')->middleware('mahasiswa')->group(function () {
=======
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
// Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('mahasiswa')->name('mahasiswa.')->middleware(CheckMahasiswa::class)->group(function () {
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    Route::get('/', function () {
        return view('/mahasiswa/index');
    })->name('index');

    // Route for Controller SKMA Mahasiswa
<<<<<<< HEAD
    // Route untuk edit SKMA
    Route::get('/skma/{letter}/edit', [LetterSkmaMahasiswaController::class, 'edit'])
        ->name('skma.edit')
        ->where('letter', '.*'); // Perbaiki regex

    // Route untuk update SKMA
    Route::put('/skma/{skma}', [LetterSkmaMahasiswaController::class, 'update'])
        ->name('skma.update')
        ->where('skma', '.*'); // Gunakan 'skma' bukan 'letter'

    Route::patch('/skma/{skma}', [LetterSkmaMahasiswaController::class, 'update'])
        ->name('skma.update')
        ->where('skma', '.*');

    // Destroy SKMA
    Route::delete('/skma/{skma}', [LetterSkmaMahasiswaController::class, 'destroy'])
        ->name('skma.destroy')
        ->where('skma', '.*');

    // Resource route tanpa edit, update, dan destroy (karena udah ditangani manual)
    Route::resource('/skma', LetterSkmaMahasiswaController::class)->except(['edit', 'update', 'destroy']);

    // Route for Controller SPTMK Mahasiswa
    // Route untuk edit SPTMK
    Route::get('/sptmk/{letter}/edit', [LetterSptmkMahasiswaController::class, 'edit'])
        ->name('sptmk.edit')
        ->where('letter', '.*'); // Perbaiki regex

    // Route untuk update SPTMK
    Route::put('/sptmk/{sptmk}', [LetterSptmkMahasiswaController::class, 'update'])
        ->name('sptmk.update')
        ->where('sptmk', '.*'); // Gunakan 'sptmk' bukan 'letter'

    Route::patch('/sptmk/{sptmk}', [LetterSptmkMahasiswaController::class, 'update'])
        ->name('sptmk.update')
        ->where('sptmk', '.*');

    // Destroy SPTMK
    Route::delete('/sptmk/{sptmk}', [LetterSptmkMahasiswaController::class, 'destroy'])
        ->name('sptmk.destroy')
        ->where('sptmk', '.*');

    // Resource route tanpa edit, update, dan destroy (karena udah ditangani manual)
    Route::resource('/sptmk', LetterSptmkMahasiswaController::class)->except(['edit', 'update', 'destroy']);

    // Route for Controller LHS Mahasiswa
    // Route untuk edit Lhs
    Route::get('/lhs/{letter}/edit', [LetterLhsMahasiswaController::class, 'edit'])
        ->name('lhs.edit')
        ->where('letter', '.*'); // Perbaiki regex

    // Route untuk update Lhs
    Route::put('/lhs/{lhs}', [LetterLhsMahasiswaController::class, 'update'])
        ->name('lhs.update')
        ->where('lhs', '.*'); // Gunakan 'lhs' bukan 'letter'

    Route::patch('/lhs/{lhs}', [LetterLhsMahasiswaController::class, 'update'])
        ->name('lhs.update')
        ->where('lhs', '.*');

    // Destroy Lhs
    Route::delete('/lhs/{lhs}', [LetterLhsMahasiswaController::class, 'destroy'])
        ->name('lhs.destroy')
        ->where('lhs', '.*');

    // Resource route tanpa edit, update, dan destroy (karena udah ditangani manual)
    Route::resource('/lhs', LetterLhsMahasiswaController::class)->except(['edit', 'update', 'destroy']);

    // Route for Controller SKL Mahasiswa
    // Route untuk edit SKL
    Route::get('/skl/{letter}/edit', [LetterSklMahasiswaController::class, 'edit'])
        ->name('skl.edit')
        ->where('letter', '.*'); // Perbaiki regex

    // Route untuk update SKL
    Route::put('/skl/{skl}', [LetterSklMahasiswaController::class, 'update'])
        ->name('skl.update')
        ->where('skl', '.*'); // Gunakan 'skl' bukan 'letter'

    Route::patch('/skl/{skl}', [LetterSklMahasiswaController::class, 'update'])
        ->name('skl.update')
        ->where('skl', '.*');

    // Destroy SKL
    Route::delete('/skl/{skl}', [LetterSklMahasiswaController::class, 'destroy'])
        ->name('skl.destroy')
        ->where('skl', '.*');

    // Resource route tanpa edit, update, dan destroy (karena udah ditangani manual)
    Route::resource('/skl', LetterSklMahasiswaController::class)->except(['edit', 'update', 'destroy']);
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('/admin/index');
    })->name('index');

    Route::resource('/kaprodi', AdminKaprodiController::class);
    Route::resource('/mo', AdminMoController::class);
    Route::resource('/mahasiswa', AdminMahasiswaController::class);
});

Route::prefix('mo')->name('mo.')->middleware('mo')->group(function () {
    Route::get('/', function () {
        return view('/mo/index');
    })->name('index');

    Route::post('/submission/{letter}', [MOSubmissionController::class, 'uploadFile'])
        ->where(['letter' => '.*'])
        ->name('letter.submission');

    Route::resource('/submission', MOSubmissionController::class)
        ->parameters(['submission' => 'letter'])
        ->where(['letter' => '.*']);

    Route::resource('/history', MOHistoryController::class)
        ->parameters(['history' => 'letter'])
        ->where(['letter' => '.*']);
});

Route::prefix('kaprodi')->name('kaprodi.')->middleware('kaprodi')->group(function () {
    Route::get('/', function () {
        return view('/kaprodi/index');
    })->name('index');

    Route::resource('/submission', KaprodiSubmissionController::class)
        ->parameters(['submission' => 'letter'])
        ->where(['letter' => '.*']);

    Route::resource('/history', KaprodiHistoryController::class)
        ->parameters(['history' => 'letter'])
        ->where(['letter' => '.*']);
});

// Route::get('/send-notification', [NotificationController::class, 'sendNotification'])->middleware('auth')->name('send.notification');
=======
    Route::resource('/skma', LetterSkmaMahasiswaController::class);

    // Route for Controller SPTMK Mahasiswa
    Route::resource('/sptmk', LetterSptmkMahasiswaController::class);

    // Route for Controller LHS Mahasiswa
    Route::resource('/lhs', LetterLhsMahasiswaController::class);

    // Route for Controller SKMA Mahasiswa
    Route::resource('/skl', LetterSklMahasiswaController::class);
});

Route::get('/admin', function () {
    return view('/admin/index');
})->middleware(CheckAdmin::class);

Route::get('/mo', function () {
    return view('/mo/index');
})->middleware(CheckMO::class);

Route::get('/kaprodi', function () {
    return view('/kaprodi/index');
})->middleware(CheckKaprodi::class);
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
