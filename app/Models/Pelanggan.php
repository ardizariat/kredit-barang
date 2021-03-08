<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\TransaksiKredit;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = [
        'nama', 'slug', 'nik', 'alamat', 'no_hp', 'foto', 'status','user_id','jk'
    ];

    public function transaksiKredits()
    {
        return $this->hasMany(TransaksiKredit::class,'pelanggan_id','id');
    }

    public function transaksiCashs()
    {
        return $this->hasMany(TransaksiCash::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFotoPelanggan()
    {
        return $this->foto ? asset('/storage/images/pelanggan/' . $this->foto) : asset('/storage/images/default/avatar-1.png');
    }
}
