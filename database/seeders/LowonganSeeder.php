<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LowonganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lowongan')->truncate();
        DB::table('lowongan_jurusan')->truncate(); // Kosongkan tabel pivot

        $now = now();
        
        $lowongans = [
            [ // Lowongan ID 1
                'id_satuan_kerja' => 1, 'id_kategori_lowongan' => 1, 'id_periode' => 1, 'id_jenjang_pendidikan' => 3, // S1
                'judul_lowongan' => 'Fullstack Developer Internship', 'deskripsi' => 'Pengembangan aplikasi web menggunakan Laravel.',
                'kuota_lowongan' => 3, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(10)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(2)->toDateString(),
            ],
            [ // Lowongan ID 2
                'id_satuan_kerja' => 3, 'id_kategori_lowongan' => 2, 'id_periode' => 2, 'id_jenjang_pendidikan' => 4, // S2
                'judul_lowongan' => 'Machine Learning Research', 'deskripsi' => 'Proyek penelitian data besar dan pemodelan prediktif.',
                'kuota_lowongan' => 2, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Hybrid',
                'tanggal_buka' => $now->copy()->subDays(5)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [ // Lowongan ID 3
                'id_satuan_kerja' => 1, 'id_kategori_lowongan' => 3, 'id_periode' => null, 'id_jenjang_pendidikan' => 3, // S1
                'judul_lowongan' => 'UI/UX Mobile App Designer', 'deskripsi' => 'Mendesain tampilan dan pengalaman pengguna untuk aplikasi seluler.',
                'kuota_lowongan' => 1, 'durasi' => '4 Bulan', 'tipe_pekerjaan' => 'Remote',
                'tanggal_buka' => $now->copy()->subDays(15)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(3)->toDateString(),
            ],
            [ // Lowongan ID 4
                'id_satuan_kerja' => 4, 'id_kategori_lowongan' => 4, 'id_periode' => 1, 'id_jenjang_pendidikan' => 1, // SMA/SMK
                'judul_lowongan' => 'Content Creator & SEO', 'deskripsi' => 'Mengelola konten digital dan optimasi mesin pencari.',
                'kuota_lowongan' => 4, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(2)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(2)->toDateString(),
            ],
            [ // Lowongan ID 5
                'id_satuan_kerja' => 2, 'id_kategori_lowongan' => 5, 'id_periode' => 3, 'id_jenjang_pendidikan' => 1, // SMA/SMK
                'judul_lowongan' => 'Network & Security Assistant', 'deskripsi' => 'Membantu pemeliharaan jaringan dan keamanan server.',
                'kuota_lowongan' => 2, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Hybrid',
                'tanggal_buka' => $now->copy()->subDays(20)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [ // Lowongan ID 6
                'id_satuan_kerja' => 5, 'id_kategori_lowongan' => 2, 'id_periode' => 2, 'id_jenjang_pendidikan' => 3, // S1
                'judul_lowongan' => 'Financial Data Analyst', 'deskripsi' => 'Analisis data keuangan dan pelaporan.',
                'kuota_lowongan' => 1, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(3)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(4)->toDateString(),
            ],
            [ // Lowongan ID 7
                'id_satuan_kerja' => 1, 'id_kategori_lowongan' => 1, 'id_periode' => 3, 'id_jenjang_pendidikan' => 3, // S1
                'judul_lowongan' => 'Backend Development (Golang)',
                'deskripsi' => 'Pengembangan API dan sistem backend.',
                'kuota_lowongan' => 2, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Remote',
                'tanggal_buka' => $now->copy()->subDays(1)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [ // Lowongan ID 8
                'id_satuan_kerja' => 4, 'id_kategori_lowongan' => 4, 'id_periode' => null, 'id_jenjang_pendidikan' => 2, // D3
                'judul_lowongan' => 'Social Media Campaign',
                'deskripsi' => 'Merencanakan dan menjalankan kampanye media sosial.',
                'kuota_lowongan' => 3, 'durasi' => '4 Bulan', 'tipe_pekerjaan' => 'Hybrid',
                'tanggal_buka' => $now->copy()->subDays(7)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(2)->toDateString(),
            ],
            [ // Lowongan ID 9
                'id_satuan_kerja' => 3, 'id_kategori_lowongan' => 3, 'id_periode' => 1, 'id_jenjang_pendidikan' => 3, // S1
                'judul_lowongan' => 'Research Paper Layout',
                'deskripsi' => 'Desain tata letak untuk publikasi penelitian.',
                'kuota_lowongan' => 1, 'durasi' => '3 Bulan', 'tipe_pekerjaan' => 'Remote',
                'tanggal_buka' => $now->copy()->subDays(12)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(1)->toDateString(),
            ],
            [ // Lowongan ID 10
                'id_satuan_kerja' => 2, 'id_kategori_lowongan' => 5, 'id_periode' => 2, 'id_jenjang_pendidikan' => 1, // SMA/SMK
                'judul_lowongan' => 'IT Helpdesk & Support',
                'deskripsi' => 'Memberikan dukungan teknis kepada staf internal.',
                'kuota_lowongan' => 5, 'durasi' => '6 Bulan', 'tipe_pekerjaan' => 'Onsite',
                'tanggal_buka' => $now->copy()->subDays(8)->toDateString(), 'tanggal_tutup' => $now->copy()->addMonths(3)->toDateString(),
            ],
        ];

        // Sisipkan ID, user_input, dan tanggal_input
        $lowonganInserts = [];
        $lowonganJurusanInserts = [];
        $jurusanMapping = [
            1 => [1, 2, 3], // IT/Software (TI, SI, IK)
            2 => [2, 4], // Data Science (SI, Akuntansi)
            3 => [6], // UI/UX (DKV)
            4 => [7, 5], // Marketing/Komunikasi (Komunikasi, Manajemen)
        ];

        for ($i = 0; $i < count($lowongans); $i++) {
            $lowongan = $lowongans[$i];
            $lowongan['id'] = $i + 1; // Set ID secara manual
            $lowongan['user_input'] = 1;
            $lowongan['tanggal_input'] = $now->copy()->subDays(rand(1, 30));
            $lowonganInserts[] = $lowongan;

            // Isi tabel pivot lowongan_jurusan
            $kategoriId = $lowongan['id_kategori_lowongan'];
            $relevantJurusanIds = $jurusanMapping[$kategoriId] ?? [1];
            
            foreach ($relevantJurusanIds as $jurusanId) {
                $lowonganJurusanInserts[] = [
                    'id_lowongan' => $lowongan['id'],
                    'id_jurusan' => $jurusanId,
                ];
            }
        }
        
        DB::table('lowongan')->insert($lowonganInserts);
        DB::table('lowongan_jurusan')->insert($lowonganJurusanInserts);
    }
}