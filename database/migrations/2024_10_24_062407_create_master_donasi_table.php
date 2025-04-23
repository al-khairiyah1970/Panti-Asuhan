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
        Schema::create('master_donasi', function (Blueprint $table) {
            $table->id();
            $table->text('nama_donasi')->nullable();
            $table->text('deskripsi_donasi')->nullable();
            $table->double('target_donasi')->nullable();
            $table->double('terkumpul_donasi')->nullable();
            $table->double('kekurangan_donasi')->nullable();
            $table->date('deadline_donasi')->nullable();
            $table->string('img_donasi')->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_donasi');
    }
};
