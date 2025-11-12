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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peserta');
            $table->unsignedBigInteger('id_lowongan');
            $table->enum('jenis_pendaftaran', [
                'magang',
                'penelitian',
                'pkl'
            ])->default('magang');
            $table->date('tanggal_daftar')->useCurrent();
            $table->enum('status_penerimaan', [
                'menunggu',
                'diterima',
                'ditolak'
            ])->default('menunggu');
            $table->text('catatan')->nullable();
            $table->string('cv_path', 255)->nullable();
            $table->integer('status')->default(1)->comment('1: aktif, 0: nonaktif, 9: hapus');
            $table->integer('user_input')->nullable();
            $table->timestamp('tanggal_input')->useCurrent();
            $table->integer('user_update')->nullable();
            $table->timestamp('tanggal_update')->nullable();
            $table->foreign('id_lowongan')->references('id')->on('lowongan')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};