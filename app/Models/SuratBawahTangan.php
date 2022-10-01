<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratBawahTangan extends Model
{
    protected $table = 'surat_bawah_tangan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nomor_urut', 'tanggal', 'jenis', 'surat_sifat_id', 'notaris_id'
    ];

    public function sifat()
    {
        return $this->belongsTo(SuratSifat::class, 'surat_sifat_id');
    }

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id');
    }

    public function pihak()
    {
        return $this->hasMany(SuratBawahTanganPihak::class, 'surat_bawah_tangan_id');
    }
}
