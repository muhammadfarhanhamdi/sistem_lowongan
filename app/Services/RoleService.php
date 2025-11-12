<?php

namespace App\Services;

use App\Models\RoleModel;
use Illuminate\Http\Request;

class RoleService
{
    protected $roleModel;

    public function __construct(RoleModel $roleModel)
    {
        $this->roleModel = $roleModel;
    }

    public function getAllActiveRole()
    {
        return $this->roleModel
            ->where('nama_role', '!=', 'peserta_magang')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createRole(array $data)
    {
        return $this->roleModel->create($data);
    }

    public function getRoleById($id)
    {
        return $this->roleModel->findOrFail($id);
    }

    public function updateRole($id, array $data)
    {
        $role = $this->roleModel->findOrFail($id);
        $role->update($data);
        return $role;
    }

    public function deleteRole($id)
    {
        $role = $this->roleModel->findOrFail($id);
        $role->delete();
        return $role;
    }

    public function validateRoleData(Request $request)
    {
        return $request->validate([
            'nama_role' => 'required|string|max:100'
        ]);
    }
}