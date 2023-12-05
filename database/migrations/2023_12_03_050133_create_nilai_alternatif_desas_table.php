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
        Schema::create('nilai_alternatif_desas', function (Blueprint $table) {
            $table->string('kode_nilai_alternatif_desa')->unique()->primary();
            $table->double('nilai_c1');
            $table->double('nilai_c2');
            $table->double('nilai_c3');
            $table->double('nilai_c4');
            $table->double('nilai_c5');
            $table->double('hasil_perhitungan')->nullable();
            $table->string('kode_alternatif_desa');
            $table->string('kode_subkriteria');
            $table->timestamps();

            $table->foreign('kode_alternatif_desa')->references('kode_alternatif_desa')->on('alternatif_desas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('kode_subkriteria')->references('kode_subkriteria')->on('subkriterias')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_alternatif_desas');
    }
};
