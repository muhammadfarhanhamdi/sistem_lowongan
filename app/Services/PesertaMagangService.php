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
                $id ? Rule::unique('db_magang.peserta_magang')->ignore($id, 'id_user') : Rule::unique('db_magang.peserta_magang', 'id_user')
            ],
            'nim' => [
                'nullable',
                'string',
                'max:50',
                $id ? Rule::unique('db_magang.peserta_magang')->ignore($id, 'nim') : Rule::unique('db_magang.peserta_magang', 'nim')
            ],
            'asal_institusi' => 'required|string|max:150',
            'jurusan' => 'nullable|string|max:100',
            'fakultas' => 'nullable|string|max:100',
            'tanggal_mulai_magang' => 'nullable|date',
            'tanggal_selesai_magang' => 'nullable|date|after_or_equal:tanggal_mulai_magang',
        ];

        return $request->validate($rules);
    }
}