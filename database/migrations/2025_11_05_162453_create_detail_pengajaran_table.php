<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pengajaran', function (Blueprint $table) {
            $table->id('id_detail');
            $table->char('id_pengajaran', 8);
            $table->date('tanggal');
            $table->enum('jenis_kegiatan', ['Perkuliahan', 'UTS', 'UAS', 'Kosong']);
            $table->integer('pertemuan');
            $table->decimal('honor_pertemuan', 10, 2);
            $table->decimal('total_honor', 10, 2);
            $table->timestamps();

            $table->foreign('id_pengajaran')->references('id_pengajaran')->on('pengajaran')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pengajaran');
    }
};
