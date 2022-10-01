<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama', 'debit', 'kredit', 'tanggal', 'keterangan', 'kategori_akun_id', 'notaris_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriAkun::class, 'kategori_akun_id');
    }
}
