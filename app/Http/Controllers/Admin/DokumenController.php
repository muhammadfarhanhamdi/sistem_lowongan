<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\DokumenModel::with('peserta');
        if ($request->filled('jenis')) {
            $query->where('jenis_dokumen', $request->input('jenis'));
        }
        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->whereHas('peserta', function($qb) use ($q) {
                $qb->where('asal_institusi', 'like', "%{$q}%")->orWhere('nim', 'like', "%{$q}%");
            });
        }

        $dokumen = $query->orderBy('tanggal_upload', 'desc')->paginate(20);
        return view('admin.dokumen.index', compact('dokumen'));
    }
}
