<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaNotarisProses extends Model
{
    protected $table = 'akta_notaris_proses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'akta_notaris_jenis_proses_id', 'akta_notaris_id', 'keterangan', 'tanggal'
    ];

    public function akta()
    {
        return $this->belongsTo(AktaNotaris::class, 'akta_notaris_id');
    }

    public function jenis_proses()
    {
        return $this->belongsTo(AktaNotarisJenisProses::class, 'akta_notaris_jenis_proses_id');
    }
}
