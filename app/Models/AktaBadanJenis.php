<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaBadanJenis extends Model
{
    protected $table = 'akta_badan_jenis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name'
    ];
}
