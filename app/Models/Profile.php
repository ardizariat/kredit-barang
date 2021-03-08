<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile_users';
    protected $fillable = [
        'user_id', 'no_hp', 'alamat', 'ig', 'fb', 'github', 'website', 'bio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
