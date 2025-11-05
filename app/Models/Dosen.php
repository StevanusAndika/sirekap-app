<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_dosen',
        'nidn',
        'nama_dosen',
        'gelar',
        'no_hp',
        'email',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'id_dosen', 'id_dosen');
    }

    public function pengajaran()
    {
        return $this->hasMany(Pengajaran::class, 'id_dosen', 'id_dosen');
    }
}
