<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\KategoriPembayaranController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login');

Route::middleware(['middleware'=>'auth'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/keuangan', [AuthController::class, 'keuangan'])->name('keuangan');
    Route::get('/laporan', [AuthController::class, 'laporan'])->name('laporan');

    Route::resource('siswa', SiswaController::class);
    Route::get('/get-siswa', [SiswaController::class, 'siswa'])->name('get-siswa');
    Route::resource('kelas', KelasController::class);
    Route::get('/get-kelas', [KelasController::class, 'kelas'])->name('get-kelas');
    Route::resource('tahun-ajaran', TahunAjaranController::class);
    Route::get('/data', [TahunAjaranController::class, 'tahun_ajaran'])->name('get-tahun-ajaran');
    Route::resource('kategori', KategoriPembayaranController::class);
    Route::get('/get-kategori', [KategoriPembayaranController::class, 'kategori'])->name('get-kategori');

    Route::resource('pembayaran', PembayaranController::class);
    Route::post('/validate-payment/{id}', [PembayaranController::class, 'validatePayment'])->name('validate-payment');

    Route::resource('contact', ContactController::class);
    Route::get('/get-contact', [ContactController::class, 'contact'])->name('contact.get');
    Route::post('/update-contact/{id}', [ContactController::class, 'update'])->name('update.contact');

    Route::get('/download-pdf', [ReportController::class, 'downloadPDF'])->name('download.pdf');
    Route::get('/cetak-pdf', [ReportController::class, 'cetakPDF'])->name('cetak.pdf');
    Route::get('/export-excel', [ExcelController::class, 'export'])->name('export.excel');
    Route::get('/print-pembayaran', [ReportController::class, 'printPDF'])->name('print.pembayaran');

    Route::resource('faq', FaqController::class);

    Route::resource('pengeluaran', PengeluaranController::class);

    Route::get('/logout', [AuthController::class, 'logout']);
});
