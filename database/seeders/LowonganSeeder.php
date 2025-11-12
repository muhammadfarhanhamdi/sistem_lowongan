<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LowonganSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $lowongans = [
            [
                'id_satuan_kerja' => 1, 'id_kategori_lowongan' => 1, 'id_periode' => 1,
                'judul_lowongan' => 'Fullstack Developer Internship',
                'deskripsi' => 'Pengembangan aplikasi web menggunakan Laravel dan Vue.js.',
                'kuota_lowongan' => 3, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(10)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(2)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 3, 'id_kategori_lowongan' => 2, 'id_periode' => 2,
                'judul_lowongan' => 'Machine Learning Research',
                'deskripsi' => 'Proyek penelitian data besar dan pemodelan prediktif.',
                'kuota_lowongan' => 2, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Hybrid',
                'tanggal_buka' => $now->copy()->subDays(5)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 1, 'id_kategori_lowongan' => 3, 'id_periode' => null,
                'judul_lowongan' => 'UI/UX Mobile App Designer',
                'deskripsi' => 'Mendesain tampilan dan pengalaman pengguna untuk aplikasi seluler.',
                'kuota_lowongan' => 1, 'durasi' => '4 Bulan', 'tipe_pekerjaan' => 'Remote',
                'tanggal_buka' => $now->copy()->subDays(15)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(3)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 4, 'id_kategori_lowongan' => 4, 'id_periode' => 1,
                'judul_lowongan' => 'Content Creator & SEO',
                'deskripsi' => 'Mengelola konten digital dan optimasi mesin pencari.',
                'kuota_lowongan' => 4, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(2)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(2)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 2, 'id_kategori_lowongan' => 5, 'id_periode' => 3,
                'judul_lowongan' => 'Network & Security Assistant',
                'deskripsi' => 'Membantu pemeliharaan jaringan dan keamanan server.',
                'kuota_lowongan' => 2, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Hybrid',
                'tanggal_buka' => $now->copy()->subDays(20)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 5, 'id_kategori_lowongan' => 2, 'id_periode' => 2,
                'judul_lowongan' => 'Financial Data Analyst',
                'deskripsi' => 'Analisis data keuangan dan pelaporan.',
                'kuota_lowongan' => 1, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(3)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(4)->toDateString(),
            ],
             [
                'id_satuan_kerja' => 1, 'id_kategori_lowongan' => 1, 'id_periode' => 3,
                'judul_lowongan' => 'Backend Development (Golang)',
                'deskripsi' => 'Pengembangan API dan sistem backend.',
                'kuota_lowongan' => 2, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Remote',
                'tanggal_buka' => $now->copy()->subDays(1)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 4, 'id_kategori_lowongan' => 4, 'id_periode' => null,
                'judul_lowongan' => 'Social Media Campaign',
                'deskripsi' => 'Merencanakan dan menjalankan kampanye media sosial.',
                'kuota_lowongan' => 3, 'durasi' => '4 Bulan', 'tipe_pekerjaan' => 'Hybrid',
                'tanggal_buka' => $now->copy()->subDays(7)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(2)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 3, 'id_kategori_lowongan' => 3, 'id_periode' => 1,
                'judul_lowongan' => 'Research Paper Layout',
                'deskripsi' => 'Desain tata letak untuk publikasi penelitian.',
                'kuota_lowongan' => 1, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Remote',
                'tanggal_buka' => $now->copy()->subDays(12)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 2, 'id_kategori_lowongan' => 5, 'id_periode' => 2,
                'judul_lowongan' => 'IT Helpdesk & Support',
                'deskripsi' => 'Memberikan dukungan teknis kepada staf internal.',
                'kuota_lowongan' => 5, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(8)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(3)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 5, 'id_kategori_lowongan' => 1, 'id_periode' => 1,
                'judul_lowongan' => 'Data Entry and Admin',
                'deskripsi' => 'Membantu entri data dan tugas administrasi.',
                'kuota_lowongan' => 2, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(4)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [
                'id_satuan_kerja' => 1, 'id_kategori_lowongan' => 2, 'id_periode' => 2,
                'judul_lowongan' => 'BI Reporting',
                'deskripsi' => 'Pengembangan laporan Business Intelligence.',
                'kuota_lowongan' => 1, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Hybrid',
                'tanggal_buka' => $now->copy()->subDays(9)->toDateString(),
                'tanggal_tutup' => $now->copy()->addMonths(4)->toDateString(),
            ],
        ];

        foreach ($lowongans as &$lowongan) {
            $lowongan['user_input'] = 1;
            $lowongan['tanggal_input'] = now();
        }
        
        DB::table('lowongan')->insert($lowongans);
    }
}