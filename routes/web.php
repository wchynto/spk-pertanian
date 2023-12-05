<?php

use App\Http\Controllers\AlternatifDesaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiAlternatifDesaController;
use App\Http\Controllers\SubkriteriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route(
        'login'
    ));
});

Route::get('/login', [
    App\Http\Controllers\AuthController::class,
    'viewLogin'
])->name('login');
Route::post('/login', [
    App\Http\Controllers\AuthController::class,
    'authenticate'
])->name('authenticate');
Route::get('/logout', [
    App\Http\Controllers\AuthController::class,
    'logout'
])->name('logout');

Route::group([
    'middleware' => ['auth', 'prevent-back-history'],
], function () {
    Route::group([
        'middleware' => 'admin',
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard', [
                'title' => 'Dashboard'
            ]);
        })->name('dashboard');
        Route::resource('kecamatan', KecamatanController::class)->name('kecamatan', '*');
        Route::resource('kriteria', KriteriaController::class)->name('kriteria', '*');
        Route::resource('subkriteria', SubkriteriaController::class)->name('subkriteria', '*');
    });

    Route::group([
        'middleware' => 'user',
        'prefix' => 'user',
        'as' => 'user.',
    ], function () {
        Route::get('dashboard', function () {
            return view('user.dashboard', [
                'title' => 'Dashboard'
            ]);
        })->name('dashboard');
        Route::resource('alternatif-desa', AlternatifDesaController::class)->name('alternatif-desa', '*');
        Route::resource('nilai-alternatif-desa', NilaiAlternatifDesaController::class)->name('nilai-alternatif-desa', '*');
        Route::get('perhitungan-moora/normalisasi', [
            App\Http\Controllers\PerhitunganMooraController::class,
            'normalisasiView'
        ])->name('perhitungan-moora.normalisasi');
        Route::get('perhitungan-moora/normalisasi-terbobot', [
            App\Http\Controllers\PerhitunganMooraController::class,
            'normalisasiTerbobotView'
        ])->name('perhitungan-moora.normalisasi-terbobot');
        Route::get('perhitungan-moora/hasil-akhir', [
            App\Http\Controllers\PerhitunganMooraController::class,
            'hasilAkhirView'
        ])->name('perhitungan-moora.hasil-akhir');
    });
});
