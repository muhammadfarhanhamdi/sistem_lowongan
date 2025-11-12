<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeMagangSeeder extends Seeder
{
    public function run(): void
    {        
        $currentYear = date('Y');

        DB::table('periode_magang')->insert([
            ['nama_periode' => "Periode Ganjil {$currentYear}", 'tanggal_mulai' => "{$currentYear}-09-01", 'tanggal_selesai' => "{$currentYear}-12-31"],
            ['nama_periode' => "Periode Genap {$currentYear}", 'tanggal_mulai' => "{$currentYear}-02-01", 'tanggal_selesai' => "{$currentYear}-05-31"],
            ['nama_periode' => "Periode Pendek {$currentYear}", 'tanggal_mulai' => "{$currentYear}-06-01", 'tanggal_selesai' => "{$currentYear}-07-31"],
        ]);
    }
}