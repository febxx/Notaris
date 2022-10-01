<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratBawahTanganPihak extends Model
{
    protected $table = 'surat_bawah_tangan_pihak';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'surat_bawah_tangan_id', 'selaku', 'nama', 'alamat', 'rt', 'rw', 'dusun', 'kelurahan_id'
    ];

    public function surat()
    {
        return $this->belongsTo(SuratBawahTangan::class, 'surat_bawah_tangan_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
