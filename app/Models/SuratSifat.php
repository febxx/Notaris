<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratSifat extends Model
{
    protected $table = 'surat_sifat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'notaris_id'
    ];

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id');
    }
}
