<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriPembayaran extends Model
{
    use HasFactory;
    protected $fillable=[
        'kategori',
        'nominal',
        'tahun_ajaran_id',
    ];
    public function tahunAjaran()
    {
        return $this->belongsTo(tahunAjaran::class);
    }
}
