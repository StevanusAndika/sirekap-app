<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengajaran extends Model
{
    use HasFactory;

    protected $table = 'detail_pengajaran';
    protected $primaryKey = 'id_detail';
    public $timestamps = true;

    protected $fillable = [
        'id_pengajaran',
        'tanggal',
        'jenis_kegiatan',
        'pertemuan',
        'honor_pertemuan',
        'total_honor'
    ];

    public function pengajaran()
    {
        return $this->belongsTo(Pengajaran::class, 'id_pengajaran', 'id_pengajaran');
    }
}
