<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaPpatJenis extends Model
{
    protected $table = 'akta_ppat_jenis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'deskripsi'
    ];

    public function proses()
    {
        return $this->hasMany(AktaPpatJenisProses::class, 'akta_ppat_jenis_id');
    }
}
