<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'indonesia_districts';
    protected $primaryKey = 'code';
    protected $fillable = [
        'id', 'code', 'city_code', 'name', 'meta', 'alamat'
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'city_code');
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'code');
    }
}
