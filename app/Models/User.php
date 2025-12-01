<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'id_role',
        'username',
        'jurusan',
        'pendidikan',
        'telepon',
        'alamat',
        'jabatan',
        'tanggal_lahir',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationship to roles table if present in this project.
     */
    public function roleModel()
    {
        return $this->belongsTo(\App\Models\RoleModel::class, 'id_role', 'id');
    }

    /**
     * Get a role name for this user. Tries multiple fallbacks: explicit `role` attribute,
     * relation `roleModel`, or `id_role` lookup in `roles` table.
     */
    public function getRoleName()
    {
        if (!empty($this->role) && is_string($this->role)) {
            return $this->role;
        }

        if (method_exists($this, 'roleModel')) {
            $rel = $this->roleModel()->first();
            if ($rel && isset($rel->nama_role)) {
                return $rel->nama_role;
            }
        }

        if (!empty($this->id_role)) {
            try {
                return \DB::table('roles')->where('id', $this->id_role)->value('nama_role');
            } catch (\Throwable $e) {
                return null;
            }
        }

        return null;
    }

    /**
     * Convenience check for admin role.
     */
    public function isAdmin(): bool
    {
        $name = $this->getRoleName();
        return strtolower((string) $name) === 'admin' || (!empty($this->id_role) && $this->id_role == 1);
    }
}
