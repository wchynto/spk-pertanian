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
        Schema::create('subkriterias', function (Blueprint $table) {
            $table->string('kode_subkriteria')->unique()->primary();
            $table->string('keterangan');
            $table->integer('nilai');
            $table->string('kode_kriteria');
            $table->timestamps();

            $table->foreign('kode_kriteria')->references('kode_kriteria')->on('kriterias')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subkriterias');
    }
};
