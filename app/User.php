<?php

namespace App;

use App\Scope\EmailVerifiedAtScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 访问器
     * @return mixed
     */
    public function getDisplayNameAttribute()
    {
        return $this->nickname ? $this->nickname : $this->name;
    }

    /**
     * 修改器
     * @param $value 银行卡号
     */
    public function setCardNoAttribute($value)
    {
        $value = str_replace(' ', '', $value);
        $this->attributes['card_no'] = encrypt($value);
    }

    /**
     * 脱敏
     * @return string
     */
    public function getCardNumAttribute()
    {
        if (!$this->card_no) {
            return '';
        }
        $cardNo = decrypt($this->card_no);
        $lastFour = mb_substr($cardNo, -4);
        return '**** **** **** ' . $lastFour;
    }

    protected $casts = [
        'settings' => 'array',
    ];


    protected static function boot()
    {
        parent::boot();

        //static::addGlobalScope(new \App\Scopes\EmailVerifiedAtScope());

        //通过匿名函数来实现全局作用域
        /*
        static::addGlobalScope('email_verified_at_scope', function (Builder $builder) {
            return $builder->whereNotNull('email_verified_at');
        });
        */
    }

    //模型事件与自定义事件类的映射
    protected $dispatchesEvents = [
      'deleting' => \App\Events\UserDeleting::class,
      'deleted' => \App\Events\UserDeleted::class,
    ];

    public function profile()
    {
        return $this->hasOne(\App\UserProfile::class);
    }

    public function posts()
    {
        return $this->hasMany(\App\Post::class);
    }

    public function image()
    {
        return $this->morphOne(\App\Image::class, 'imageable');
    }
}
