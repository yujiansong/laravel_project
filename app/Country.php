<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts()
    {
        return $this->hasManyThrough(\App\Post::class, \App\User::class);
    }
}
