<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaPpatProses extends Model
{
    protected $table = 'akta_ppat_proses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'akta_ppat_jenis_proses_id', 'akta_ppat_id', 'keterangan', 'tanggal'
    ];

    public function akta()
    {
        return $this->belongsTo(AktaPpat::class, 'akta_ppat_id');
    }

    public function jenis_proses()
    {
        return $this->belongsTo(AktaPpatJenisProses::class, 'akta_ppat_jenis_proses_id');
    }
}
