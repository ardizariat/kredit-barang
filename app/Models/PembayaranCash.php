<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
use App\User;

class PembayaranCash extends Model
{
    protected $table = 'pembayaran_cash';
    protected $fillable = [
         'admin', 'transaksi_id','no_pembayaran', 'tanggal_bayar', 'bayar', 'keterangan','status'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'admin', 'id');
    }
}
