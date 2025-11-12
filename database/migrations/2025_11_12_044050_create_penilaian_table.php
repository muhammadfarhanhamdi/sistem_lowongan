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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peserta');
            $table->unsignedBigInteger('id_mentor')->nullable();
            $table->integer('aspek_disiplin')->default(0);
            $table->integer('aspek_kehadiran')->default(0);
            $table->integer('aspek_kemampuan')->default(0);
            $table->integer('aspek_kerjasama')->default(0);
            $table->decimal('total_nilai', 5, 2)->nullable();
            $table->text('komentar')->nullable();
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
        Schema::dropIfExists('penilaian');
    }
};