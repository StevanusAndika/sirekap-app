<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'password',
        'email',
        'role',
        'is_active',
        'ls_lock'
    ];

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

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'id_user', 'id_user');
    }

    public function logAktifitas()
    {
        return $this->hasMany(LogAktifitas::class, 'id_user', 'id_user');
    }
}
