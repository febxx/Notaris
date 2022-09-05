<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaNotarisJenis extends Model
{
    protected $table = 'akta_notaris_jenis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'notaris_id'
    ];

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id');
    }

    public function proses()
    {
        return $this->hasMany(AktaNotarisJenisProses::class, 'akta_notaris_jenis_id');
    }
}
