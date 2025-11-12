<?php

namespace App\Services;

use App\Models\PeriodeMagangModel;
use Illuminate\Http\Request;

class PeriodeMagangService
{
    protected $periodeMagangModel;

    public function __construct(PeriodeMagangModel $periodeMagangModel)
    {
        $this->periodeMagangModel = $periodeMagangModel;
    }

    public function getAllActivePeriodeMagang()
    {
        return $this->periodeMagangModel->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createPeriodeMagang(array $data)
    {
        return $this->periodeMagangModel->create($data);
    }

    public function getPeriodeMagangById($id)
    {
        return $this->periodeMagangModel->findOrFail($id);
    }

    public function updatePeriodeMagang($id, array $data)
    {
        $periodeMagang = $this->periodeMagangModel->findOrFail($id);
        $periodeMagang->update($data);
        return $periodeMagang;
    }

    public function deletePeriodeMagang($id)
    {
        $periodeMagang = $this->periodeMagangModel->findOrFail($id);
        $periodeMagang->status = 9;
        $periodeMagang->save();
        return $periodeMagang;
    }

    public function validatePeriodeMagangData(Request $request)
    {
        return $request->validate([
            'nama_periode' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai'
        ]);
    }
}