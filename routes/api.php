<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PengajaranController;
use Illuminate\Support\Facades\Route;

// A. Routing untuk UserController
Route::get('/users', [UserController::class, 'LihatData']);
Route::post('/users', [UserController::class, 'SimpanData']);
Route::delete('/users/{id}', [UserController::class, 'HapusData']);
Route::put('/users/{id}', [UserController::class, 'EditData']);

// B. Routing untuk DosenController
Route::get('/dosen', [DosenController::class, 'LihatData']);
Route::post('/dosen', [DosenController::class, 'SimpanData']);
Route::delete('/dosen/{id}', [DosenController::class, 'HapusData']);
Route::put('/dosen/{id}', [DosenController::class, 'EditData']);

// C. Routing untuk MatakuliahController
Route::get('/matakuliah', [MatakuliahController::class, 'LihatData']);
Route::post('/matakuliah', [MatakuliahController::class, 'SimpanData']);
Route::delete('/matakuliah/{id}', [MatakuliahController::class, 'HapusData']);
Route::put('/matakuliah/{id}', [MatakuliahController::class, 'EditData']);

// D. Routing untuk KelasController
Route::get('/kelas', [KelasController::class, 'LihatData']);
Route::post('/kelas', [KelasController::class, 'SimpanData']);
Route::delete('/kelas/{id}', [KelasController::class, 'HapusData']);
Route::put('/kelas/{id}', [KelasController::class, 'EditData']);

// E. Routing untuk PengajaranController - DIPERBAIKI
Route::get('/pengajaran', [PengajaranController::class, 'LihatData']);
Route::get('/pengajaran/{id}', [PengajaranController::class, 'LihatDataById']); // TAMBAH INI
Route::post('/pengajaran', [PengajaranController::class, 'SimpanData']);
Route::delete('/pengajaran/{id}', [PengajaranController::class, 'HapusData']);
Route::put('/pengajaran/{id}', [PengajaranController::class, 'EditData']);

// Detail Pengajaran Routes
Route::get('/pengajaran/list-detail/{id_pengajaran}', [PengajaranController::class, 'LihatDetailData']);
Route::post('/pengajaran/simpan-detail', [PengajaranController::class, 'SimpanDetailData']);
Route::put('/pengajaran/edit-detail/{id}', [PengajaranController::class, 'EditDetailData']);
Route::delete('/pengajaran/hapus-detail/{id}', [PengajaranController::class, 'HapusDetailData']);
