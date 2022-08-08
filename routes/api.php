<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GetDataController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Jadwal


Route::group(['middleware' => ['auth:sanctum'], 'namespace'=>'App\Http\Controllers\API'], function() {

Route::get('user', [AuthController::class, 'user']);
Route::put('user', [AuthController::class, 'update']);
Route::post('user', [AuthController::class, 'update']);
Route::post('logout', [AuthController::class, 'logout']);

Route::get('userById/{id}', [GetDataController::class, 'userById'])->name('userById');
//jadwal
Route::get('getJadwal', [GetDataController::class, 'getJadwal'])->name('getJadwal');
Route::get('getJadwal/{id}', [GetDataController::class, 'getJadwalById'])->name('getJadwalById');
Route::post('getJadwal', [GetDataController::class, 'storeJadwal'])->name('storeJadwal');
Route::put('getJadwal/{id}', [GetDataController::class, 'updateJadwal'])->name('updateJadwal');
Route::delete('getJadwal/{id}', [GetDataController::class, 'deleteJadwal'])->name('deleteJadwal');

//buku tamu
Route::get('getBukuTamu', [GetDataController::class, 'getBukuTamu'])->name('getBukuTamu');
Route::get('getBukuTamu/{id}', [GetDataController::class, 'getBukuTamuById'])->name('getBukuTamuById');
Route::post('getBukuTamu', [GetDataController::class, 'storeBukuTamu'])->name('storeBukuTamu');
Route::put('getBukuTamu/{id}', [GetDataController::class, 'updateBukuTamu'])->name('updateBukuTamu');
Route::delete('getBukuTamu/{id}', [GetDataController::class, 'deleteBukuTamu'])->name('deleteBukuTamu');
Route::get('getBukuTamuUserById/{idUser}', [GetDataController::class, 'getBukuTamuUserById'])
        ->name('getBukuTamuUserById');

        
    Route::get('/posts', [PostController::class, 'index']); // all posts
    Route::post('/posts', [PostController::class, 'store']); // create post
    Route::get('/posts/{id}', [PostController::class, 'show']); // get single post
    Route::put('/posts/{id}', [PostController::class, 'update']); // update post
    Route::delete('/posts/{id}', [PostController::class, 'destroy']); // delete post

    Route::get('getPegawai', [GetDataController::class, 'getPegawai'])->name('getPegawai');
    Route::get('getInstansi', [GetDataController::class, 'getInstansi'])->name('getInstansi');
    Route::get('getPegawaiInstansiById/{idInstansi}', [GetDataController::class, 'getPegawaiInstansiById'])
        ->name('getPegawaiInstansiById');
    
});
