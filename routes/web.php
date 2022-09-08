<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NotarisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AktaNotarisController;
use App\Http\Controllers\AktaNotarisJenisController;
use App\Http\Controllers\AktaNotarisPihakController;
use App\Http\Controllers\AktaNotarisProsesController;
use App\Http\Controllers\AktaNotarisJenisProsesController;
use App\Http\Controllers\AktaBadanController;
use App\Http\Controllers\AktaBadanJenisController;
use App\Http\Controllers\AktaBadanJenisSifatController;
use App\Http\Controllers\AktaPpatController;
use App\Http\Controllers\AktaPpatProsesController;
use App\Http\Controllers\AktaPpatPihakController;
use App\Http\Controllers\AktaPpatJenisController;
use App\Http\Controllers\AktaPpatJenisProsesController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'kelola-notaris' => NotarisController::class,
        'kelola-staff' => StaffController::class,
        'kelola-client' => ClientController::class,
        'akta-notaris' => AktaNotarisController::class,
        'akta-notaris-pihak' => AktaNotarisPihakController::class,
        'akta-notaris-proses' => AktaNotarisProsesController::class,
        'akta-notaris-jenis' => AktaNotarisJenisController::class,
        'akta-notaris-jenis-proses' => AktaNotarisJenisProsesController::class,
        'akta-badan' => AktaBadanController::class,
        'akta-badan-jenis' => AktaBadanJenisController::class,
        'akta-badan-jenis-sifat' => AktaBadanJenisSifatController::class,
        'akta-ppat' => AktaPpatController::class,
        'akta-ppat-pihak' => AktaPpatPihakController::class,
        'akta-ppat-proses' => AktaPpatProsesController::class,
        'akta-ppat-jenis' => AktaPpatJenisController::class,
        'akta-ppat-jenis-proses' => AktaPpatJenisProsesController::class,
    ]);

    Route::post('getKabupaten', [PlaceController::class, 'getKabupaten']);
    Route::post('getKecamatan', [PlaceController::class, 'getKecamatan']);
    Route::post('getKelurahan', [PlaceController::class, 'getKelurahan']);
    Route::post('getSifatAktaBadan', [AktaBadanController::class, 'getSifatAktaBadan']);
    Route::get('/logout', [LoginController::class, 'destroy']);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store'])->name('login');
