<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaBadan extends Model
{
    protected $table = 'akta_badan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nomor', 'nama', 'tanggal', 'register', 'alamat', 'rt', 'rw', 'dusun', 'kelurahan_id', 'akta_badan_jenis_id', 'akta_badan_jenis_sifat_id', 'notaris_id', 'client_id', 'staff_id'
    ];

    public function jenis()
    {
        return $this->belongsTo(AktaBadanJenis::class, 'akta_badan_jenis_id');
    }

    public function sifat()
    {
        return $this->belongsTo(AktaBadanJenisSifat::class, 'akta_badan_jenis_sifat_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
