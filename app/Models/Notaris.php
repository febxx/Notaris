<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kelurahan;

class Notaris extends Model
{
    protected $table = 'notaris';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama', 'email', 'telepon', 'alamat', 'rt', 'rw', 'dusun', 'kelurahan_id', 'group', 'npwp', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
