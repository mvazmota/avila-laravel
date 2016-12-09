<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    //

    public static function randomString()
    {
        return str_random(25);
    }
}
