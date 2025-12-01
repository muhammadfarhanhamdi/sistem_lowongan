<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenModel extends Model
{
    use HasFactory;
    protected $connection = 'db_magang';
    protected $table = 'dokumen';
    protected $guarded = [];
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_input = \Auth::check() ? \Auth::id() : null;
            $model->tanggal_input = now();
        });
    }

    public function peserta()
    {
        return $this->belongsTo(PesertaMagangModel::class, 'id_peserta', 'id');
    }
}
