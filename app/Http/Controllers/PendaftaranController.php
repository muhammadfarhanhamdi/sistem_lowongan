<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranModel;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = PendaftaranModel::with(['lowongan','peserta'])->orderBy('tanggal_daftar','desc')->paginate(20);
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function show($id)
    {
        $item = PendaftaranModel::with(['lowongan','peserta'])->findOrFail($id);
        return view('admin.pendaftaran.show', compact('item'));
    }

    public function approve($id)
    {
        $p = PendaftaranModel::findOrFail($id);
        $p->status_penerimaan = 'diterima';
        $p->save();
        return redirect()->back()->with('success', 'Pendaftaran diterima.');
    }

    public function reject($id)
    {
        $p = PendaftaranModel::findOrFail($id);
        $p->status_penerimaan = 'ditolak';
        $p->save();
        return redirect()->back()->with('success', 'Pendaftaran ditolak.');
    }
}
