<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class UserModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'db_magang';
    protected $table = 'users';
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_input = Auth::check() ? Auth::id() : null;
        });

        static::updating(function ($model) {
            $model->user_update = Auth::check() ? Auth::id() : null;
        });
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'id_role', 'id');
    }
}