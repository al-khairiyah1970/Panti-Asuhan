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
        Schema::create('master_donatur', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_donasi')->nullable();
            $table->text('nama_depan')->nullable();
            $table->text('nama_belakang')->nullable();
            $table->text('email')->nullable();
            $table->text('telepon')->nullable();
            $table->double('nominal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_donatur');
    }
};
