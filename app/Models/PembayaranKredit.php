<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TransaksiKredit;
use App\User;

class PembayaranKredit extends Model
{
    protected $table = 'pembayaran_kredit';
    protected $fillable = [
        'admin', 'transaksi_id','no_pembayaran', 'tanggal_bayar', 'bayar','sisa', 'keterangan','status'
    ];
    // protected $with = ['transaksi','user'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'admin', 'id');
    }
}
