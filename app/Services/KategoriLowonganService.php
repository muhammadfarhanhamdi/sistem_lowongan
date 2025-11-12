<?php

namespace App\Services;

use App\Models\KategoriLowonganModel;
use Illuminate\Http\Request;

class KategoriLowonganService
{
    protected $kategoriLowonganModel;

    public function __construct(KategoriLowonganModel $kategoriLowonganModel)
    {
        $this->kategoriLowonganModel = $kategoriLowonganModel;
    }

    public function getAllActiveKategoriLowongan()
    {
        return $this->kategoriLowonganModel->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createKategoriLowongan(array $data)
    {
        return $this->kategoriLowonganModel->create($data);
    }

    public function getKategoriLowonganById($id)
    {
        return $this->kategoriLowonganModel->findOrFail($id);
    }

    public function updateKategoriLowongan($id, array $data)
    {
        $kategoriLowongan = $this->kategoriLowonganModel->findOrFail($id);
        $kategoriLowongan->update($data);
        return $kategoriLowongan;
    }

    public function deleteKategoriLowongan($id)
    {
        $kategoriLowongan = $this->kategoriLowonganModel->findOrFail($id);
        $kategoriLowongan->status = 9;
        $kategoriLowongan->save();
        return $kategoriLowongan;
    }

    public function validateKategoriLowonganData(Request $request)
    {
        return $request->validate([
            'nama_kategori' => 'required|string|max:100'
        ]);
    }
}