<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'SIREKAP API is running!',
        'version' => '1.0.0',
        'endpoints' => [
            'users' => '/api/users',
            'dosen' => '/api/dosen',
            'matakuliah' => '/api/matakuliah',
            'kelas' => '/api/kelas',
            'pengajaran' => '/api/pengajaran'
        ]
    ]);
});
