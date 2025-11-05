<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->char('id_dosen', 6)->primary();
            $table->string('nidn', 20)->unique();
            $table->string('nama_dosen', 100);
            $table->string('gelar', 50)->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('email', 100);
            $table->foreignId('id_user')->nullable()->constrained('users', 'id_user')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
