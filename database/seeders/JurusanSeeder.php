<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jurusan')->insert([
            ['nama_jurusan' => 'Teknik Informatika', 'user_input' => 1],
            ['nama_jurusan' => 'Sistem Informasi', 'user_input' => 1],
            ['nama_jurusan' => 'Ilmu Komputer', 'user_input' => 1],
            ['nama_jurusan' => 'Akuntansi', 'user_input' => 1],
            ['nama_jurusan' => 'Manajemen Bisnis', 'user_input' => 1],
            ['nama_jurusan' => 'Desain Komunikasi Visual', 'user_input' => 1],
            ['nama_jurusan' => 'Ilmu Komunikasi', 'user_input' => 1],
            ['nama_jurusan' => 'Hukum', 'user_input' => 1],
        ]);
    }
}