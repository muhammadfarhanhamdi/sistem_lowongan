<?php

namespace App\Services;

use App\Models\TahunModel;
use Illuminate\Http\Request;

class TahunService
{
    protected $tahunModel;

    public function __construct(TahunModel $tahunModel)
    {
        $this->tahunModel = $tahunModel;
    }

    public function getAllActiveTahun()
    {
        return $this->tahunModel->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createTahun(array $data)
    {
        return $this->tahunModel->create($data);
    }

    public function getTahunById($id)
    {
        return $this->tahunModel->findOrFail($id);
    }

    public function updateTahun($id, array $data)
    {
        $tahun = $this->tahunModel->findOrFail($id);
        $tahun->update($data);
        return $tahun;
    }

    public function deleteTahun($id)
    {
        $tahun = $this->tahunModel->findOrFail($id);
        $tahun->status = 9;
        $tahun->save();
        return $tahun;
    }

    public function validateTahunData(Request $request)
    {
        return $request->validate([
            'tahun' => 'required|digits:4|integer'
        ]);
    }
}
