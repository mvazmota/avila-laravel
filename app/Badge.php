<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = ['name', 'image'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'badge_user', 'badge_id', 'user_id');
    }
}
