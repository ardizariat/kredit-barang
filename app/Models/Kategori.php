<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'kategori', 'status'
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id', 'id');
    }
}
