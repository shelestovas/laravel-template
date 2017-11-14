<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //

    public function exists($key, $type)
    {
        return self::where('key', $key)->where('type', $type)->exists();
    }
}
