<?php

namespace App\Services;

use App\Models\JenjangPendidikanModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JenjangPendidikanService
{
    protected $jenjangPendidikanModel;

    public function __construct(JenjangPendidikanModel $jenjangPendidikanModel)
    {
        $this->jenjangPendidikanModel = $jenjangPendidikanModel;
    }

    public function validateJenjangData(Request $request, $id = null)
    {
        return $request->validate([
            'nama_jenjang' => [
                'required',
                'string',
                'max:50',
                $id 
                    ? Rule::unique('db_magang.jenjang_pendidikan', 'nama_jenjang')->ignore($id) 
                    : 'unique:db_magang.jenjang_pendidikan,nama_jenjang'
            ]
        ]);
    }

    public function getAllActiveJenjang()
    {
        return $this->jenjangPendidikanModel->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createJenjang(array $data)
    {
        return $this->jenjangPendidikanModel->create($data);
    }

    public function getJenjangById($id)
    {
        return $this->jenjangPendidikanModel->findOrFail($id);
    }

    public function updateJenjang($id, array $data)
    {
        $jenjang = $this->jenjangPendidikanModel->findOrFail($id);
        $jenjang->update($data);
        return $jenjang;
    }

    public function deleteJenjang($id)
    {
        $jenjang = $this->jenjangPendidikanModel->findOrFail($id);
        $jenjang->status = 9;
        $jenjang->save();
        return $jenjang;
    }
}