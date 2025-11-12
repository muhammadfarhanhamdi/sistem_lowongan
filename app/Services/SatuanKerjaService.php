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
            'id_user' => [
                'required',
                'integer',
                'exists:db_magang.users,id',
                $id ? Rule::unique('db_magang.satuan_kerja')->ignore($id, 'id_user') : Rule::unique('db_magang.satuan_kerja', 'id_user')
            ],
            'nama_satuan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'kuota' => 'required|integer|min:0'
        ];

        return $request->validate($rules);
    }
}