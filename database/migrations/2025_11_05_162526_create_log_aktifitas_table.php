<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_aktifitas', function (Blueprint $table) {
            $table->id('id_log');
            $table->foreignId('id_user')->nullable()->constrained('users', 'id_user')->onDelete('set null');
            $table->string('aktivitas', 255);
            $table->dateTime('waktu_aktivitas')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_aktifitas');
    }
};
