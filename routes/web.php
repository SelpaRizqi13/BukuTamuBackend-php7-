<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::resource('login', LoginController::class);
    Route::resource('register', RegisterController::class);
});


Route::middleware(['auth'])->group(function () {

    Route::resource('user', UserController::class);    
    Route::resource('buku_tamu', BukuTamuController::class);
    Route::resource('instansi', InstansiController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('survei', SurveiController::class);
    Route::resource('dashboard', DashboardController::class);
    

    //export PDF
    Route::get('/user_exportpdf/{awal}/{akhir}', [UserController::class, 'exportpdf'])->name('exportpdf');
    Route::get('/pegawai_exportpdf/{awal}/{akhir}', [PegawaiController::class, 'exportpdf'])->name('exportpdfpegawai');
    Route::get('/instansi_exportpdf/{awal}/{akhir}', [InstansiController::class, 'exportpdf'])->name('exportpdfinstansi');
    Route::get('/bukutamu_exportpdf/{awal}/{akhir}', [BukuTamuController::class, 'exportpdf'])->name('exportpdfbukutamu');
    Route::get('/jadwal_exportpdf/{awal}/{akhir}', [JadwalController::class, 'exportpdf'])->name('exportpdfjadwal');

    //form print pertanggal
    Route::get('/user_print_data/{tglawal}/{tglakhir}', [UserController::class, 'print_user'])->name('print_data_pertanggal');
    Route::get('/instansi_print_data/{tglawal}/{tglakhir}', [InstansiController::class, 'print_instansi'])->name('print_pertanggal');
    Route::get('/pegawai_print_data/{tglawal}/{tglakhir}', [PegawaiController::class, 'print_pegawai'])->name('print_pertanggal_data');
    Route::get('/bukutamu_print_data/{tglawal}/{tglakhir}', [BukuTamuController::class, 'print_tamu'])->name('print_pertanggal_datatamu');
    Route::get('/jadwal_print_data/{tglawal}/{tglakhir}', [JadwalController::class, 'print_jadwal'])->name('print_pertanggal_datajadwal');

    //print laporan
    Route::get('/print_user', [UserController::class, 'print_user'])->name('print_user');

    Route::get('getpegawai/{id}', 'BukuTamuController@getpegawai');

    //buku tamu
    Route::get('buku_tamu', [BukuTamuController::class, 'index'])->name('buku.tamu.index');
    Route::get('buku_tamu/{id}/show', [BukuTamuController::class, 'show'])->name('buku.tamu.show');
    Route::get('buku_tamu/create', [BukuTamuController::class, 'create'])->name('getdatapegawai');
    Route::post('buku_tamu/create', [BukuTamuController::class, 'store'])->name('buku.tamu.store');
    Route::get('buku_tamu/{id}/edit', [BukuTamuController::class, 'edit'])->name('buku.tamu.edit');
    Route::put('buku_tamu/{id}/update', [BukuTamuController::class, 'update'])->name('buku.tamu.update');
    Route::delete('buku_tamu/{id}/destroy', [BukuTamuController::class, 'destroy'])->name('buku.tamu.destroy');
    Route::get('/approved/{id}', [BukuTamuController::class, 'approved'])->name('buku.tamu.approved');
    Route::get('/canceled/{id}', [BukuTamuController::class, 'canceled'])->name('buku.tamu.canceled');

    Route::get('delete_user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('delete_bukutamu/{id}', [BukuTamuController::class, 'destroy'])->name('bukutamu.destroy');
    Route::get('delete_instansi/{id}', [InstansiController::class, 'destroy'])->name('instansi.destroy');
    Route::get('delete_pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::get('delete_jadwal/{id}', [JadwalController::class, 'destroy'])->name('pegawai.destroy');

    //logout
    Route::post('/logout', [LoginController::class, 'logout']);
});