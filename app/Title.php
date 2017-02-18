<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = ['name', 'image'];

    public function users()
    {
        return $this->hasMany('App\User', 'title_id');
    }
}
