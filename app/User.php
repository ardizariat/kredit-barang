<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Profile;
use App\Models\Pelanggan;
use App\Models\TransaksiCash;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','foto','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaksiKredits()
    {
        return $this->hasMany(TransaksiKredit::class, 'admin', 'id');
    }

    public function pembayaranKredits()
    {
        return $this->hasMany(PembayaranKredit::class, 'admin', 'id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile','user_id','id');
    }
    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class);
    }

    public function getFotoProfile()
    {
        return $this->foto ? asset('/storage/images/user/' . $this->foto) : asset('/images/avatar-3.png');
    }

    public function transaksiCashs()
    {
        return $this->hasMany(TransaksiCash::class, 'admin', 'id');
    }

    public function pembayaranCashs()
    {
        return $this->hasMany(PembayaranCash::class, 'admin', 'id');
    }
}
