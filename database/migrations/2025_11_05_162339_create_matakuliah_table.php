<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->char('id_matakuliah', 6)->primary();
            $table->string('kode_matakuliah', 10)->unique();
            $table->string('nama_matakuliah', 100);
            $table->integer('sks');
            $table->integer('semester');
            $table->enum('jenis', ['teori', 'praktikum', 'seminar', 'mbkm']);
            $table->char('id_dosen', 6);
            $table->enum('jenis_dosen', ['pengampu', 'pengajaran']);
            $table->timestamps();

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
