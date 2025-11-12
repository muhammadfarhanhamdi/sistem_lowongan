<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\RoleService;

class UserController extends Controller
{
    protected $userService;
    protected $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $users = $this->userService->getAllActiveUsers();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleService->getAllActiveRole();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->userService->validateUserData($request);
            $user = $this->userService->createUser($validatedData);
            Alert::success('Berhasil', 'User berhasil ditambahkan.');
            return redirect()->route('admin.user.edit', ['id' => $user->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $user = $this->userService->getUserById($id);
            $roles = $this->roleService->getAllActiveRole();
            return view('admin.user.edit', compact('user', 'roles'));
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')
                ->with('error', 'Data user tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->userService->validateUserData($request, $id);
            $this->userService->updateUser($id, $validatedData);
            Alert::success('Berhasil', 'Data User berhasil diperbarui.');
            return redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->userService->deleteUser($id);
            Alert::success('Berhasil', 'User berhasil dihapus.');
            return redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.user.index');
        }
    }
}