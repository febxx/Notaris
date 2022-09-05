<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'indonesia_cities';
    protected $primaryKey = 'code';
    protected $fillable = [
        'id', 'code', 'province_code', 'name', 'meta', 'alamat'
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'province_code');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'city_code');
    }
}
