<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'indonesia_provinces';
    protected $primaryKey = 'code';
    protected $fillable = [
        'id', 'code', 'name', 'meta', 'alamat'
    ];

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'province_code');
    }
}
