<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DokKegiatanController;
use App\Http\Controllers\KlasifikasiSampahController;
use App\Http\Controllers\LaporanBulananControllerr;
use App\Http\Controllers\KetuaRwController;
use App\Http\Controllers\BukuTabunganController;
use App\Http\Controllers\LaporanBulananController;
use App\Http\Controllers\DataNasabahController;
use App\Http\Controllers\NamaRwController;
use App\Http\Controllers\JadwalPenjemputanSampahController;
use App\Http\Controllers\RekapSampahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute untuk halaman depan
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman home yang akan memanggil HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('registrasi', RegistrasiController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('dok_kegiatan', DokKegiatanController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('klasifikasi_sampah', KlasifikasiSampahController::class);
    Route::resource('units', UnitController::class);
    Route::resource('rekap_sampah', RekapSampahController::class);
    Route::resource('jadwal', JadwalPenjemputanSampahController::class);
    Route::resource('nama_rw', NamaRwController::class);
    Route::resource('ketua-rw', KetuaRwController::class);
    Route::resource('data_nasabah', DataNasabahController::class);
    Route::resource('buku_tabungan', BukuTabunganController::class);
    Route::resource('laporan_bulanan', LaporanBulananController::class);
    Route::get('/laporan/jenis-sampah', [LaporanBulananController::class, 'laporanJenisSampah'])->name('laporan.jenis_sampah');
});
// Route buku tabungan
Route::get('/buku-tabungan/export-pdf/{id}', [BukuTabunganController::class, 'exportPdf'])->name('buku_tabungan.export_pdf');

use App\Http\Controllers\BukuKeuanganNasabahMasukController;

Route::resource('buku_keuangan_nasabah_masuk', BukuKeuanganNasabahMasukController::class);

use App\Http\Controllers\BukuKeuanganNasabahKeluarController;

Route::get('buku-keuangan-nasabah-keluar', [BukuKeuanganNasabahKeluarController::class, 'index'])->name('buku-keuangan-nasabah-keluar.index');
Route::get('buku-keuangan-nasabah-keluar/create/{id_masuk}', [BukuKeuanganNasabahKeluarController::class, 'create'])->name('buku-keuangan-nasabah-keluar.create');
Route::post('buku-keuangan-nasabah-keluar', [BukuKeuanganNasabahKeluarController::class, 'store'])->name('buku-keuangan-nasabah-keluar.store');
Route::get('buku-keuangan-nasabah-keluar/{id}', [BukuKeuanganNasabahKeluarController::class, 'show'])->name('buku-keuangan-nasabah-keluar.show');
Route::get('buku-keuangan-nasabah-keluar/{id}/edit', [BukuKeuanganNasabahKeluarController::class, 'edit'])->name('buku-keuangan-nasabah-keluar.edit');
Route::put('buku-keuangan-nasabah-keluar/{id}', [BukuKeuanganNasabahKeluarController::class, 'update'])->name('buku-keuangan-nasabah-keluar.update');
Route::delete('buku-keuangan-nasabah-keluar/{id}', [BukuKeuanganNasabahKeluarController::class, 'destroy'])->name('buku-keuangan-nasabah-keluar.destroy');
Route::get('/buku-keuangan-nasabah-masuk/cetak/{id}', [App\Http\Controllers\BukuKeuanganNasabahMasukController::class, 'cetakPdf'])->name('buku_keuangan_nasabah_masuk.cetak');
