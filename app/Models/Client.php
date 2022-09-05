<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Notaris;
use App\Models\Kelurahan;

class Client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'nama', 'email', 'telepon', 'alamat', 'rt', 'rw', 'dusun', 'kelurahan_id', 'notaris_id', 'user_id'
    ];

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'notaris_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
