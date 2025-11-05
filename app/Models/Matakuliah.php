<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'id_matakuliah';
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_matakuliah',
        'kode_matakuliah',
        'nama_matakuliah',
        'sks',
        'semester',
        'jenis',
        'id_dosen',
        'jenis_dosen'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
    }

    public function pengajaran()
    {
        return $this->hasMany(Pengajaran::class, 'id_matakuliah', 'id_matakuliah');
    }
}
