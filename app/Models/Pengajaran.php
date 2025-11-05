<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajaran extends Model
{
    use HasFactory;

    protected $table = 'pengajaran';
    protected $primaryKey = 'id_pengajaran';
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pengajaran',
        'id_dosen',
        'id_matakuliah',
        'id_kelas',
        'tahun_ajar',
        'semester'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah', 'id_matakuliah');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function detailPengajaran()
    {
        return $this->hasMany(DetailPengajaran::class, 'id_pengajaran', 'id_pengajaran');
    }
}
