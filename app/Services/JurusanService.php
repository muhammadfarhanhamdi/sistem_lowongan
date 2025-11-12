<?php

namespace App\Services;

use App\Models\JurusanModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JurusanService
{
    protected $jurusanModel;

    public function __construct(JurusanModel $jurusanModel)
    {
        $this->jurusanModel = $jurusanModel;
    }

    public function getAllActiveJurusan()
    {
        return $this->jurusanModel->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createJurusan(array $data)
    {
        return $this->jurusanModel->create($data);
    }

    public function getJurusanById($id)
    {
        return $this->jurusanModel->findOrFail($id);
    }

    public function updateJurusan($id, array $data)
    {
        $jurusan = $this->jurusanModel->findOrFail($id);
        $jurusan->update($data);
        return $jurusan;
    }

    public function deleteJurusan($id)
    {
        $jurusan = $this->jurusanModel->findOrFail($id);
        $jurusan->status = 9;
        $jurusan->save();
        return $jurusan;
    }

    public function validateJurusanData(Request $request, $id = null)
    {
        return $request->validate([
            'nama_jurusan' => [
                'required',
                'string',
                'max:150',
                $id 
                    ? Rule::unique('db_magang.jurusan', 'nama_jurusan')->ignore($id) 
                    : 'unique:db_magang.jurusan,nama_jurusan'
            ]
        ]);
    }
}