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
        Schema::create('kategori_lowongan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 100);
            $table->integer('status')->default(1)->comment('1: aktif, 0: nonaktif, 9: hapus');
            $table->string('user_input', 100)->nullable();
            $table->timestamp('tanggal_input')->useCurrent();
            $table->string('user_update', 100)->nullable();
            $table->timestamp('tanggal_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_lowongan');
    }
};