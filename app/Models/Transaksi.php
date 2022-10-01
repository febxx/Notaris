<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'jenis', 'nominal', 'tanggal', 'keterangan', 'notaris_id', 'akta_ppat_id', 'akta_notaris_id', 'akta_badan_id', 'kategori_akun_id'
    ];

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id');
    }

    public function akta_ppat()
    {
        return $this->belongsTo(AktaPpat::class, 'akta_ppat_id');
    }

    public function akta_notaris()
    {
        return $this->belongsTo(AktaNotaris::class, 'akta_notaris_id');
    }

    public function akta_badan()
    {
        return $this->belongsTo(AktaBadan::class, 'akta_badan_id');
    }

    public function kategori_akun()
    {
        return $this->belongsTo(KategoriAkun::class, 'kategori_akun_id');
    }
}
