<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaNotarisJenisProses extends Model
{
    protected $table = 'akta_notaris_jenis_proses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'deskripsi', 'jangka_waktu', 'peringatkan', 'notaris_id', 'akta_notaris_jenis_id'
    ];

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id');
    }

    public function jenis()
    {
        return $this->belongsTo(AktaNotarisJenis::class, 'akta_notaris_jenis_id');
    }
}
