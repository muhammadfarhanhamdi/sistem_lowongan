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
        Schema::create('jurnal_harian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peserta');
            $table->unsignedBigInteger('id_mentor')->nullable();
            $table->date('tanggal');
            $table->text('kegiatan');
            $table->enum('status_verifikasi', [
                'menunggu',
                'disetujui',
                'ditolak'
            ])->default('menunggu');
            $table->text('catatan')->nullable();
            $table->integer('status')->default(1)->comment('1: aktif, 0: nonaktif, 9: hapus');
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
        Schema::dropIfExists('jurnal_harian');
    }
};