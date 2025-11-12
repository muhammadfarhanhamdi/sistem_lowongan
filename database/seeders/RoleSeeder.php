<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            ['nama_role' => 'admin'],
            ['nama_role' => 'mentor'],
            ['nama_role' => 'peserta_magang'],
            ['nama_role' => 'satuan_kerja'],
        ]);
    }
}