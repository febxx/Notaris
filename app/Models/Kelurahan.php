<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'indonesia_villages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'code', 'district_code', 'name', 'meta', 'alamat'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'district_code');
    }
}
