<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaPpatPihak extends Model
{
    protected $table = 'akta_ppat_pihak';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'selaku', 'nama', 'alamat', 'rt', 'rw', 'dusun', 'kelurahan_id', 'npwp', 'nik', 'akta_ppat_id', 'alamat_sementara'
    ];

    public function akta()
    {
        return $this->belongsTo(AktaPpat::class, 'akta_ppat_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
