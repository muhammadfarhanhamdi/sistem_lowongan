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
        Schema::create('periode_magang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_periode', 100);
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->integer('status')->default(1)->comment('1: aktif, 0: nonaktif, 9: hapus');
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('periode_magang');
    }
};