<?php

namespace App;


use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole
{

    protected $fillable = [
        'slug', 'name', 'permissions',
    ];
}
