<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qrcodes extends Model
{
    protected $fillable = ['name', 'image'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'qrcode_user', 'qrcode_id', 'user_id')->withTimestamps();
    }
}
