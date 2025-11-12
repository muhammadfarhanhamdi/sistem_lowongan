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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->enum('nama_role', [
                'admin',
                'mentor',
                'peserta_magang',
                'satuan_kerja'
            ])->unique();
            $table->integer('user_input')->nullable();
            $table->timestamp('tanggal_input')->useCurrent();
            $table->integer('user_update')->nullable();
            $table->timestamp('tanggal_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};