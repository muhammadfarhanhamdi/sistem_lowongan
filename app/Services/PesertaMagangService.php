<?php

namespace App\Services;

use App\Models\PesertaMagangModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PesertaMagangService
{
    protected $pesertaMagangModel;

    public function __construct(PesertaMagangModel $pesertaMagangModel)
    {
        $this->pesertaMagangModel = $pesertaMagangModel;
    }

    public function getAllActivePeserta()
    {
        return $this->pesertaMagangModel->with('user')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createPeserta(array $data)
    {
        return $this->pesertaMagangModel->create($data);
    }

    public function getPesertaById($id)
    {
        return $this->pesertaMagangModel->with('user')->findOrFail($id);
    }

    public function updatePeserta($id, array $data)
    {
        $peserta = $this->pesertaMagangModel->findOrFail($id);
        $peserta->update($data);
        return $peserta;
    }

    public function deletePeserta($id)
    {
        $peserta = $this->pesertaMagangModel->findOrFail($id);
        $peserta->status = 9;
        $peserta->save();
        return $peserta;
    }

    public function validatePesertaData(Request $request, $id = null)
    {
        $rules = [
            'id_user' => [
                'required',
                'integer',
                'exists:db_magang.users,id',
                // removed unique constraint on id_user to allow multiple peserta records per user
            ],
            'nim' => [
                'nullable',
                'string',
                'max:50',
                // allow non-unique NIM here (no unique rule)
            ],
            'asal_institusi' => 'required|string|max:150',
            'jurusan' => 'nullable|string|max:100',
            'fakultas' => 'nullable|string|max:100',
            // removed tanggal_mulai_magang and tanggal_selesai_magang validation per request
            // NOTE: CV handling is performed separately and stored in `dokumen` table; do not include 'cv' here
        ];

        return $request->validate($rules);
    }
}