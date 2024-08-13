<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'siswa_id',
        'kelas_id',
        'tahun_ajaran_id',
        'kategori_pembayaran_id',
        'validasi',
        'nominal',
        'tanggal',
    ];
    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
    public function tahunAjaran()
    {
        return $this->belongsTo(tahunAjaran::class);
    }
    public function kategoriPembayaran()
    {
        return $this->belongsTo(kategoriPembayaran::class);
    }
}
