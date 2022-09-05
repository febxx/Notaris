<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaNotarisPihak extends Model
{
    protected $table = 'akta_notaris_pihak';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'selaku', 'nama', 'alamat', 'rt', 'rw', 'dusun', 'kelurahan_id', 'npwp', 'nik', 'akta_notaris_id'
    ];

    public function akta()
    {
        return $this->belongsTo(AktaNotaris::class, 'akta_notaris_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kelurahan::class, 'district_code');
    }
}
