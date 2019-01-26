<?php
namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Events\Dispatcher;

class PostEventSubscriber
{
    /**
     * 处理文章删除前事件
     * @param $event
     */
    public function OnPostDeleting($event)
    {
        Log::info('文章即将删除 [' . $event->post->title . ']: ' . $event->post->content);
    }

    /**
     * 处理文章删除后事件
     * @param $event
     */
    public function OnPostDeleted($event)
    {
        Log::info('文章已经删除 [' . $event->post->title . ']: ' . $event->post->content);
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\PostDeleting::class,
            PostEventSubscriber::class . '@OnPostDeleting'
        );

        $events->listen(
            \App\Events\PostDeleted::class,
            PostEventSubscriber::class . '@OnPostDeleted'
        );
    }
}