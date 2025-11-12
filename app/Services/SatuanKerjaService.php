<?php

namespace App\Services;

use App\Models\SatuanKerjaModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SatuanKerjaService
{
    protected $satuanKerjaModel;

    public function __construct(SatuanKerjaModel $satuanKerjaModel)
    {
        $this->satuanKerjaModel = $satuanKerjaModel;
    }

    public function getAllActiveSatuanKerja()
    {
        return $this->satuanKerjaModel->with('user')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createSatuanKerja(array $data)
    {
        return $this->satuanKerjaModel->create($data);
    }

    public function getSatuanKerjaById($id)
    {
        return $this->satuanKerjaModel->findOrFail($id);
    }

    public function updateSatuanKerja($id, array $data)
    {
        $satuanKerja = $this->satuanKerjaModel->findOrFail($id);
        $satuanKerja->update($data);
        return $satuanKerja;
    }

    public function deleteSatuanKerja($id)
    {
        $satuanKerja = $this->satuanKerjaModel->findOrFail($id);
        $satuanKerja->status = 9;
        $satuanKerja->save();
        return $satuanKerja;
    }

    public function validateSatuanKerjaData(Request $request, $id = null)
    {
        $rules = [
            'nama_satuan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'kuota' => 'required|integer|min:0'
        ];

        return $request->validate($rules);
    }

    public function getUnassignedSatuanKerja()
    {
        return $this->satuanKerjaModel
            ->where('status', 1)
            ->whereNull('id_user')
            ->get();
    }

    public function getSatuanKerjaByUserId($userId)
    {
        return $this->satuanKerjaModel
            ->where('id_user', $userId)
            ->first();
    }

    public function assignUserToSatuanKerja($satuanKerjaId, $userId)
    {
        $satuanKerja = $this->getSatuanKerjaById($satuanKerjaId);
        $satuanKerja->id_user = $userId;
        $satuanKerja->save();
        return $satuanKerja;
    }

    public function removeUserFromSatuanKerja($userId)
    {
        $satuanKerja = $this->getSatuanKerjaByUserId($userId);
        if ($satuanKerja) {
            $satuanKerja->id_user = null;
            $satuanKerja->save();
            return $satuanKerja;
        }
        return null;
    }
}