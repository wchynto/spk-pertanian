<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alternatif_desas', function (Blueprint $table) {
            $table->string('kode_alternatif_desa')->unique()->primary();
            $table->string('nama_desa');
            $table->string('luas_tanah');
            $table->double('hasil_perhitungan');
            $table->string('kode_kecamatan');
            $table->timestamps();

            $table->foreign('kode_kecamatan')->references('kode_kecamatan')->on('kecamatans')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_desas');
    }
};
