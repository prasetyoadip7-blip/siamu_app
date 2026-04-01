<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboard;


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return redirect()->route('dashboard');

});


/*
|--------------------------------------------------------------------------
| GLOBAL DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $user = Auth::user();

    switch ($user->role) {

        case 'admin':
            return redirect()->route('admin.dashboard');

        case 'guru':
            return redirect()->route('guru.dashboard');

        case 'siswa':
            return redirect()->route('siswa.dashboard');

        default:
            Auth::logout();
            return redirect()->route('login');
    }

})->middleware('auth')->name('dashboard');


/*
|--------------------------------------------------------------------------
| PROFILE USER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class,'index'])->name('profile');

    Route::post('/profile/update', [ProfileController::class,'update'])->name('profile.update');

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class,'index'])->name('dashboard');

        Route::resource('kelas', KelasController::class);
        Route::resource('mapel', MapelController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('jadwal', JadwalController::class);
        Route::resource('nilai', NilaiController::class);

});


/*
|--------------------------------------------------------------------------
| GURU ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {

        Route::get('/dashboard', [GuruDashboard::class,'index'])->name('dashboard');

        Route::resource('jadwal', JadwalController::class)->only(['index','show']);
        Route::resource('nilai', NilaiController::class);

});


/*
|--------------------------------------------------------------------------
| SISWA ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {

        Route::get('/dashboard', [SiswaDashboard::class,'index'])->name('dashboard');

        Route::resource('jadwal', JadwalController::class)->only(['index','show']);
        Route::resource('nilai', NilaiController::class)->only(['index','show']);

});


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';