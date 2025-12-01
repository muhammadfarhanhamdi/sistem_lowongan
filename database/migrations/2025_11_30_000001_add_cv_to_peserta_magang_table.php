<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCvToPesertaMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('db_magang')->table('peserta_magang', function (Blueprint $table) {
            $table->string('cv')->nullable()->after('tanggal_selesai_magang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('db_magang')->table('peserta_magang', function (Blueprint $table) {
            $table->dropColumn('cv');
        });
    }
}
