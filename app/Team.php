<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'image'];

    public function users()
    {
        return $this->hasMany('App\User', 'team_id');
    }

//    public function owners()
//    {
//        return $this->belongsToMany('App\User', 'team_owners', 'team_id', 'user_id');
//    }
}
