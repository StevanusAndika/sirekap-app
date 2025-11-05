<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'kapasitas',
        'tahun_ajaran',
        'semester',
        'program_studi',
        'jenjang'
    ];

    public function pengajaran()
    {
        return $this->hasMany(Pengajaran::class, 'id_kelas', 'id_kelas');
    }
}
