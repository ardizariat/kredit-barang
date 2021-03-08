<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';    
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','admin',  'pelanggan_id', 'barang_id','jenis_pembayaran', 'tanggal_transaksi','qty','total_harga','sisa','keterangan','status','dibayar'
    ];
    // protected $with = ['pelanggan', 'barang', 'pembayaranKredits', 'pembayaranCash', 'user'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function pembayaranKredits()
    {
        return $this->hasMany(PembayaranKredit::class, 'transaksi_id', 'id');
    }
    public function pembayaranCash()
    {
        return $this->hasOne(PembayaranCash::class, 'transaksi_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'admin', 'id');
    }
}
