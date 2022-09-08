<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaPpat extends Model
{
    protected $table = 'akta_ppat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nomor', 'register', 'tanggal', 'akta_ppat_jenis_id', 'notaris_id', 'client_id', 'staff_id', 'alamat', 'rt', 'rw', 'dusun', 'kelurahan_id', 'luas_tanah', 'luas_bangunan', 'nilai_pengalihan', 'nop', 'njop_tahun', 'njop_tanah', 'njop_bangunan', 'ssp_tanggal', 'ssp_nilai', 'sspd_tanggal', 'sspd_nilai', 'ssb_tanggal', 'ssb_nilai', 'keterangan'
    ];

    public function jenis()
    {
        return $this->belongsTo(AktaPpatJenis::class, 'akta_ppat_jenis_id');
    }

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function proses()
    {
        return $this->hasMany(AktaPpatProses::class, 'akta_ppat_id');
    }

    public function pihak()
    {
        return $this->hasMany(AktaPpatPihak::class, 'akta_ppat_id');
    }
}
