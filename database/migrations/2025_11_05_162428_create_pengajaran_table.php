<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajaran', function (Blueprint $table) {
            $table->char('id_pengajaran', 8)->primary();
            $table->char('id_dosen', 6);
            $table->char('id_matakuliah', 6);
            $table->char('id_kelas', 6);
            $table->integer('tahun_ajar');
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->timestamps();

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('cascade');
            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('matakuliah')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajaran');
    }
};
