<?php

use App\Http\Controllers\AlternatifDesaController;
use App\Http\Controllers\KecamatanController;
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
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    Route::get('dashboard', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('dashboard');

    Route::resource('kecamatan', KecamatanController::class)->name('kecamatan', '*');
    Route::resource('alternatif-desa', AlternatifDesaController::class)->name('alternatif-desa', '*');
});
