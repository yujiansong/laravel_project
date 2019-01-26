<?php
namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Events\Dispatcher;

class UserEventSubscriber
{
    /**
     * 处理用户删除前事件
     * @param $events
     */
    public function onUserDeleting($events)
    {
        Log::info('用户即将删除 [' . $events->user->id . ']: ' . $events->user->name);
    }

    /**
     * 处理用户删除后事件
     * @param $events
     */
    public function onUserDeleted($events)
    {
        Log::info('用户已经删除 [' . $events->user->id . ']: ' . $events->user->name);
    }


    public function subscribe($events)
    {
        $events->listen(
            \App\Events\UserDeleting::class,
            UserEventSubscriber::class . '@onUserDeleting'
        );

        $events->listen(
            \App\Events\UserDeleted::class,
            UserEventSubscriber::class . '@onUserDeleted'
        );
    }

}