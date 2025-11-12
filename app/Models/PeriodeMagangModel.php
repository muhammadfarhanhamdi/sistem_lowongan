<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PeriodeMagangModel extends Model
{
    use HasFactory;
    protected $connection = 'db_magang';
    protected $table = 'periode_magang';
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
}