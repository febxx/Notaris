<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaBadanJenisSifat extends Model
{
    protected $table = 'akta_badan_jenis_sifat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'akta_badan_jenis_id'
    ];

    public function jenis()
    {
        return $this->belongsTo(AktaBadanJenis::class, 'akta_badan_jenis_id');
    }
}
