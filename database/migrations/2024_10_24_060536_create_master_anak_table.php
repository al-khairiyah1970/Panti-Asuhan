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
        Schema::create('master_anak', function (Blueprint $table) {
            $table->id();
            $table->text('nama')->nullable();
            $table->bigInteger('usia')->nullable();
            $table->text('asal_daerah')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('prestasi')->nullable();
            $table->text('cita_cita')->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_anak');
    }
};
