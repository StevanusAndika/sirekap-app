<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->char('id_kelas', 6)->primary();
            $table->string('nama_kelas', 10);
            $table->integer('kapasitas');
            $table->string('tahun_ajaran', 9);
            $table->enum('semester', ['ganjil', 'genap']);
            $table->enum('program_studi', [
                'Rekayasa Perangkat Lunak',
                'Sistem Informasi',
                'Informatika',
                'Kewirausahaan',
                'Manajemen',
                'Kebidanan'
            ]);
            $table->enum('jenjang', ['S1', 'S2', 'D3']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
