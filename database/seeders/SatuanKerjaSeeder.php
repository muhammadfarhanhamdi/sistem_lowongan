<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanKerjaSeeder extends Seeder
{
    public function run(): void
    {        
        $data = [
            ['id_user' => 1, 'nama_satuan' => 'Pusat Teknologi Informasi', 'deskripsi' => 'Divisi pengembang sistem dan infrastruktur IT.', 'kuota' => 15],
            ['id_user' => null, 'nama_satuan' => 'Biro Umum dan Kepegawaian', 'deskripsi' => 'Unit yang menangani administrasi umum dan SDM.', 'kuota' => 5],
            ['id_user' => null, 'nama_satuan' => 'Direktorat Penelitian', 'deskripsi' => 'Fokus pada pengembangan riset dan inovasi.', 'kuota' => 8],
            ['id_user' => null, 'nama_satuan' => 'Unit Komunikasi Publik', 'deskripsi' => 'Mengelola media sosial dan hubungan masyarakat.', 'kuota' => 10],
            ['id_user' => null, 'nama_satuan' => 'Bagian Keuangan', 'deskripsi' => 'Mengurus anggaran dan pembukuan.', 'kuota' => 4],
        ];

        foreach ($data as &$item) {
            $item['user_input'] = 1;
        }

        DB::table('satuan_kerja')->insert($data);
    }
}