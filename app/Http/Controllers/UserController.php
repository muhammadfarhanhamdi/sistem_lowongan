<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\RoleService;
use App\Services\SatuanKerjaService;
use App\Models\RoleModel;

class UserController extends Controller
{
    protected $userService;
    protected $roleService;
    protected $satuanKerjaService;

    public function __construct(
        UserService $userService,
        RoleService $roleService,
        SatuanKerjaService $satuanKerjaService
    ) {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->satuanKerjaService = $satuanKerjaService;
    }

    public function index()
    {
        $users = $this->userService->getAllActiveUsers();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleService->getAllActiveRole();
        $satuanKerjas = $this->satuanKerjaService->getUnassignedSatuanKerja();
        return view('admin.user.create', compact('roles', 'satuanKerjas'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->userService->validateUserData($request);
            $user = $this->userService->createUser($validatedData);

            $satuanKerjaRoleId = RoleModel::where('nama_role', 'satuan_kerja')->value('id');
            if ($request->id_role == $satuanKerjaRoleId && $request->id_satuan_kerja) {
                $this->satuanKerjaService->assignUserToSatuanKerja($request->id_satuan_kerja, $user->id);
            }

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
            
            $unassignedSatuanKerjas = $this->satuanKerjaService->getUnassignedSatuanKerja();
            $currentUserSatuanKerja = $this->satuanKerjaService->getSatuanKerjaByUserId($user->id);

            return view('admin.user.edit', compact('user', 'roles', 'unassignedSatuanKerjas', 'currentUserSatuanKerja'));
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')
                ->with('error', 'Data user tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->userService->validateUserData($request, $id);
            $user = $this->userService->updateUser($id, $validatedData);

            $satuanKerjaRoleId = RoleModel::where('nama_role', 'satuan_kerja')->value('id');
            
            $this->satuanKerjaService->removeUserFromSatuanKerja($user->id);

            if ($request->id_role == $satuanKerjaRoleId && $request->id_satuan_kerja) {
                $this->satuanKerjaService->assignUserToSatuanKerja($request->id_satuan_kerja, $user->id);
            }

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
            $this->satuanKerjaService->removeUserFromSatuanKerja($id);
            $this->userService->deleteUser($id);
            Alert::success('Berhasil', 'User berhasil dihapus.');
            return redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data.');
            return redirect()->route('admin.user.index');
        }
    }
}