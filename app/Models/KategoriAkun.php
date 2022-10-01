<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAkun extends Model
{
    protected $table = 'kategori_akun';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name'
    ];
}
