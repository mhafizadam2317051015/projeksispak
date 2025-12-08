<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyakits', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('presentasi')->nullable();
            $table->text('deskripsi')->nullable();

            // Kolom tambahan sesuai seeder
            $table->text('perilaku_penyebab')->nullable();
            $table->text('penanganan_mandiri')->nullable();
            $table->text('saran_bawa_dokter')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyakits');
    }
};
