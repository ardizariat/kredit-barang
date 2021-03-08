<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    // protected $with = ['suppliers', 'kategoris'];
    protected $fillable = [
        'nama', 'slug',  'kategori_id', 'supplier_id' ,'merk','tanggal_beli', 'harga_beli', 'harga_jual_cash', 'laba_cash', 'harga_jual_kredit', 'laba_kredit', 'ram', 'memori',  'gambar', 'deskripsi','status'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function transaksiKredits()
    {
        return $this->hasMany(TransaksiKredit::class, 'barang_id', 'id');
    }

    public function transaksiCashs()
    {
        return $this->hasMany(TransaksiCash::class, 'barang_id', 'id');
    }

    public function getGambarBarang()
    {
        return $this->gambar ? asset('/storage/images/barang/' . $this->gambar) : asset('/images/default.png');
    }
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
