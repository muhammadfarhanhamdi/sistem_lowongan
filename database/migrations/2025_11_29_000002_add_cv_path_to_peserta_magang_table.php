<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peserta_magang', function (Blueprint $table) {
            if (!Schema::hasColumn('peserta_magang', 'cv_path')) {
                $table->string('cv_path', 255)->nullable()->after('asal_institusi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('peserta_magang', function (Blueprint $table) {
            if (Schema::hasColumn('peserta_magang', 'cv_path')) {
                $table->dropColumn('cv_path');
            }
        });
    }
};
