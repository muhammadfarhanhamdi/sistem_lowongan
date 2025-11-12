<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lowongan_jurusan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lowongan');
            $table->unsignedBigInteger('id_jurusan');
            $table->primary(['id_lowongan', 'id_jurusan']);
            $table->foreign('id_lowongan')->references('id')->on('lowongan')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongan_jurusan');
    }
};