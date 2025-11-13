<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangPendidikanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenjang_pendidikan')->insert([
            ['nama_jenjang' => 'SMA/SMK', 'user_input' => 1],
            ['nama_jenjang' => 'D3', 'user_input' => 1],
            ['nama_jenjang' => 'S1', 'user_input' => 1],
            ['nama_jenjang' => 'S2', 'user_input' => 1],
        ]);
    }
}