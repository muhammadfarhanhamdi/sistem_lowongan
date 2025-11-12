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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peserta');
            $table->enum('jenis_dokumen', [
                'CV',
                'Surat Pengantar',
                'Laporan Akhir',
                'Sertifikat',
                'Lainnya'
            ]);
            $table->string('file_path', 255);
            $table->timestamp('tanggal_upload')->useCurrent();
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
        Schema::dropIfExists('dokumen');
    }
};