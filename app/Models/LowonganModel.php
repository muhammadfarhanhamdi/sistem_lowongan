<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LowonganModel extends Model
{
    use HasFactory;
    protected $connection = 'db_magang';
    protected $table = 'lowongan';
    protected $guarded = [];
    public $timestamps = false;


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_input = Auth::check() ? Auth::id() : null;
            $model->tanggal_input = now();
        });

        static::updating(function ($model) {
            $model->user_update = Auth::check() ? Auth::id() : null;
            $model->tanggal_update = now();
        });
    }

    public function satuanKerja()
    {
        return $this->belongsTo(SatuanKerjaModel::class, 'id_satuan_kerja', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriLowonganModel::class, 'id_kategori_lowongan', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeMagangModel::class, 'id_periode', 'id');
    }

    public function jenjangPendidikan()
    {
        return $this->belongsTo(JenjangPendidikanModel::class, 'id_jenjang_pendidikan', 'id');
    }

    public function jurusan()
    {
        return $this->belongsToMany(JurusanModel::class, 'lowongan_jurusan', 'id_lowongan', 'id_jurusan');
    }

    public function pelamar()
    {
        return $this->hasMany(PendaftaranModel::class, 'id_lowongan', 'id');
    }
}