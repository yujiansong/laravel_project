<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //监听模型获取事件
        \App\User::retrieved(function ($user) {
            Log::info('从模型中获取用户[' . $user->id . ']: ' . $user->nickname);
        });

        \App\Post::retrieved(function ($post) {
           Log::info('从模型中获取文章[' . $post->title . ']: ' . $post->content);
        });

        \App\User::observe(\App\Observers\UserObserver::class);
    }

    protected $subscribe = [
        \App\Listeners\UserEventSubscriber::class,
        \App\Listeners\PostEventSubscriber::class,
    ];
}
