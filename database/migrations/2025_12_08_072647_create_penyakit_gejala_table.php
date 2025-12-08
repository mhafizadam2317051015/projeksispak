<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyakit_gejala', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penyakit_id');
            $table->unsignedBigInteger('gejala_id');
            $table->timestamps();

            // Relasi
            $table->foreign('penyakit_id')->references('id')->on('penyakits')->onDelete('cascade');
            $table->foreign('gejala_id')->references('id')->on('gejalas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyakit_gejala');
    }
};
