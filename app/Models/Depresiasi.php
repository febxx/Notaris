<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depresiasi extends Model
{
    protected $table = 'depresiasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nominal', 'keterangan', 'akun_id', 'notaris_id'
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'akun_id');
    }
}
