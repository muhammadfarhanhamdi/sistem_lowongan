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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_satuan_kerja');
            $table->unsignedBigInteger('id_kategori_lowongan');
            $table->unsignedBigInteger('id_periode')->nullable()->comment('Opsional, jika lowongan terikat periode');
            $table->string('judul_lowongan');
            $table->text('deskripsi')->nullable();
            $table->text('kualifikasi')->nullable();
            $table->integer('kuota_lowongan')->default(1)->comment('Kuota spesifik untuk lowongan ini');
            $table->string('durasi', 100)->nullable()->comment('Contoh: 3 Bulan, 6 Bulan');
            $table->enum('tipe_pekerjaan', ['Onsite', 'Remote', 'Hybrid'])->default('Onsite');
            $table->date('tanggal_buka')->nullable();
            $table->date('tanggal_tutup')->nullable();
            $table->integer('status')->default(1)->comment('1: aktif, 0: nonaktif, 9: hapus');
            $table->integer('user_input')->nullable();
            $table->timestamp('tanggal_input')->useCurrent();
            $table->integer('user_update')->nullable();
            $table->timestamp('tanggal_update')->nullable();
            $table->foreign('id_satuan_kerja')->references('id')->on('satuan_kerja')->onDelete('cascade');
            $table->foreign('id_kategori_lowongan')->references('id')->on('kategori_lowongan')->onDelete('cascade');
            $table->foreign('id_periode')->references('id')->on('periode_magang')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan');
    }
};