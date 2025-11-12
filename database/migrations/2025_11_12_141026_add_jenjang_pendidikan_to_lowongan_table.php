<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lowongan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenjang_pendidikan')->after('id_periode')->nullable();
            $table->foreign('id_jenjang_pendidikan')->references('id')->on('jenjang_pendidikan')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('lowongan', function (Blueprint $table) {
            $table->dropForeign(['id_jenjang_pendidikan']);
            $table->dropColumn('id_jenjang_pendidikan');
        });
    }
};