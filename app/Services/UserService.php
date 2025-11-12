<?php

namespace App\Services;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserService
{
    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAllActiveUsers()
    {
        return $this->userModel->with('role')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userModel->create($data);
    }

    public function getUserById($id)
    {
        return $this->userModel->findOrFail($id);
    }

    public function updateUser($id, array $data)
    {
        $user = $this->userModel->findOrFail($id);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->status = 9;
        $user->save();
        return $user;
    }

    public function validateUserData(Request $request, $id = null)
    {
        $rules = [
            'name' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                'max:100',
                $id ? Rule::unique('db_magang.users')->ignore($id) : Rule::unique('db_magang.users')
            ],
            'username' => [
                'required',
                'string',
                'max:50',
                $id ? Rule::unique('db_magang.users')->ignore($id) : Rule::unique('db_magang.users')
            ],
            'id_role' => 'required|integer|exists:db_magang.roles,id',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jabatan' => 'nullable|string|max:100',
        ];

        if (!$id) {
            $rules['password'] = 'required|string|min:8|confirmed';
        } else {
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }

        return $request->validate($rules);
    }
}