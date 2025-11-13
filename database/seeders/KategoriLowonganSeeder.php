<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriLowonganSeeder extends Seeder
{
    public function run(): void
    {
        
        DB::table('kategori_lowongan')->insert([
            ['nama_kategori' => 'Web Developer', 'user_input' => 'system'],
            ['nama_kategori' => 'Data Scientist', 'user_input' => 'system'],
            ['nama_kategori' => 'UI/UX Designer', 'user_input' => 'system'],
            ['nama_kategori' => 'Marketing Digital', 'user_input' => 'system'],
            ['nama_kategori' => 'Jaringan & Server', 'user_input' => 'system'],
        ]);
    }
}