<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaNotaris extends Model
{
    protected $table = 'akta_notaris';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama', 'nomor', 'tanggal', 'register', 'akta_notaris_jenis_id', 'notaris_id', 'staff_id', 'client_id'
    ];

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id');
    }

    public function jenis()
    {
        return $this->belongsTo(AktaNotarisJenis::class, 'akta_notaris_jenis_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function proses()
    {
        return $this->hasMany(AktaNotarisProses::class, 'akta_notaris_id');
    }

    public function pihak()
    {
        return $this->hasMany(AktaNotarisPihak::class, 'akta_notaris_id');
    }
}
