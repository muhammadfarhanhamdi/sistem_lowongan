<?php

namespace App\Services;

use App\Models\LowonganModel;
use Illuminate\Http\Request;

class LowonganService
{
    protected $lowonganModel;

    public function __construct(LowonganModel $lowonganModel)
    {
        $this->lowonganModel = $lowonganModel;
    }

    public function getAllActiveLowonganForCards()
    {
        return $this->lowonganModel
            ->with(['satuanKerja', 'kategori'])
            ->withCount('pelamar')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getAllActiveLowongan()
    {
        return $this->lowonganModel
            ->with(['satuanKerja', 'kategori', 'periode', 'jenjangPendidikan', 'jurusan'])
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createLowongan(array $data)
    {
        return $this->lowonganModel->create($data);
    }

    public function getLowonganById($id)
    {
        return $this->lowonganModel->with(['satuanKerja', 'kategori', 'periode', 'jenjangPendidikan', 'jurusan'])->findOrFail($id);
    }

    public function updateLowongan($id, array $data)
    {
        $lowongan = $this->lowonganModel->findOrFail($id);
        $lowongan->update($data);
        return $lowongan;
    }

    public function deleteLowongan($id)
    {
        $lowongan = $this->lowonganModel->findOrFail($id);
        $lowongan->status = 9;
        $lowongan->save();
        return $lowongan;
    }

    public function validateLowonganData(Request $request)
    {
        return $request->validate([
            'id_satuan_kerja' => 'required|integer|exists:db_magang.satuan_kerja,id',
            'id_kategori_lowongan' => 'required|integer|exists:db_magang.kategori_lowongan,id',
            'id_periode' => 'nullable|integer|exists:db_magang.periode_magang,id',
            'id_jenjang_pendidikan' => 'required|integer|exists:db_magang.jenjang_pendidikan,id',
            'jurusan_ids' => 'required|array|min:1',
            'jurusan_ids.*' => 'integer|exists:db_magang.jurusan,id',
            'judul_lowongan' => 'required|string|max:255',
            'kuota_lowongan' => 'required|integer|min:1',
            'durasi' => 'nullable|string|max:100',
            'tipe_pekerjaan' => 'required|in:Onsite,Remote,Hybrid',
            'tanggal_buka' => 'nullable|date',
            'tanggal_tutup' => 'nullable|date|after_or_equal:tanggal_buka',
            'deskripsi' => 'nullable|string',
            'kualifikasi' => 'nullable|string',
        ]);
    }

    public function getPublicActiveLowongan($filters = [])
    {
        $query = $this->lowonganModel
            ->with(['satuanKerja', 'kategori'])
            ->withCount('pelamar') 
            ->where('status', 1)
            ->whereDate('tanggal_tutup', '>=', now());

        if (!empty($filters['posisi'])) {
            $query->where('id_kategori_lowongan', $filters['posisi']);
        }

        if (!empty($filters['satuan_kerja'])) {
            $query->where('id_satuan_kerja', $filters['satuan_kerja']);
        }

        if (!empty($filters['jenjang'])) {
            $query->where('id_jenjang_pendidikan', $filters['jenjang']);
        }

        if (!empty($filters['jurusan'])) {
            $query->whereHas('jurusan', function ($q) use ($filters) {
                $q->where('jurusan.id', $filters['jurusan']);
            });
        }
            
        return $query->orderBy('tanggal_tutup', 'asc');    }
}