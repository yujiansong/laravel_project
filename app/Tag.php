<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        /*
        return $this->belongsToMany(\App\Post::class, 'post_tags')
            ->withPivot('id')->withTimeStamps();
        */
        return $this->morphedByMany(\App\Post::class, 'taggable');
    }

    public function pages()
    {
        return $this->morphedByMany(\App\Page::class, 'taggable');
    }
}
