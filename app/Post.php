<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    //白名单属性
//    protected $fillable = ['title', 'content', 'user_id', 'views'];
    //黑名单属性
//    protected $guarded = ['*'];
    protected $guarded = ['user_id'];

    public function scopePopular(Builder $builer)
    {
        return $builer->where('views', '>', 0)->orderBy('views', 'desc');
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('status', Post::ACTIVED);
    }

    protected $dispatchesEvents = [
      'deleting' => \App\Events\PostDeleting::class,
      'deleted' => \App\Events\PostDeleted::class,
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function author()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id', 'author');
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class, 'post_tags');
    }

    public function image()
    {
        return $this->morphOne(\App\Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(\App\Comment::class, 'commentable');
    }
}
