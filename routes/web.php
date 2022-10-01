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
use App\Http\Controllers\SuratSifatController;
use App\Http\Controllers\SuratBawahTanganController;
use App\Http\Controllers\SuratBawahTanganPihakController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KategoriAkunController;
use App\Http\Controllers\DepresiasiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KeuanganController;

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
        'surat-bawah-tangan' => SuratBawahTanganController::class,
        'surat-bawah-tangan-pihak' => SuratBawahTanganPihakController::class,
        'surat-sifat' => SuratSifatController::class,
        'akun' => AkunController::class,
        'kategori-akun' => KategoriAkunController::class,
        'depresiasi' => DepresiasiController::class,
        'transaksi' => TransaksiController::class,
    ]);
    Route::get('transaksi-log', [TransaksiController::class, 'log'])->name('log-get');
    Route::get('transaksi-log-pdf', [TransaksiController::class, 'logPdf'])->name('log-pdf');
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporanget');
    Route::post('laporan', [LaporanController::class, 'store'])->name('laporanpost');
    Route::get('keuangan', [KeuanganController::class, 'index'])->name('keuangan');
    Route::get('keuangan-labarugi', [KeuanganController::class, 'indexLabaRugi'])->name('labarugi');
    Route::get('labarugipdf', [KeuanganController::class, 'pdfLabaRugi'])->name('labarugipdf');
    Route::get('keuangan-neraca', [KeuanganController::class, 'indexNeraca'])->name('neraca');
    Route::get('neracapdf', [KeuanganController::class, 'pdfNeraca'])->name('neracapdf');
    Route::post('getKabupaten', [PlaceController::class, 'getKabupaten']);
    Route::post('getKecamatan', [PlaceController::class, 'getKecamatan']);
    Route::post('getKelurahan', [PlaceController::class, 'getKelurahan']);
    Route::post('getSifatAktaBadan', [AktaBadanController::class, 'getSifatAktaBadan']);
    Route::get('/logout', [LoginController::class, 'destroy']);
});
Route::get('/kirimemail', [LaporanController::class, 'notif']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store'])->name('login');
