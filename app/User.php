<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'level', 'score', 'title_id', 'team_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function badges()
    {
        return $this->belongsToMany('App\Badge', 'badge_user', 'user_id', 'badge_id')->withTimestamps();
    }

    public function qrcodes()
    {
        return $this->belongsToMany('App\Qrcodes', 'qrcode_user', 'user_id', 'qrcode_id')->withTimestamps();
    }
}
