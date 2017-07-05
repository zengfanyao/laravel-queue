<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17-7-5
 * Time: 上午12:43
 */

namespace App\Listeners;


class UserEventSubscriber
{
    //user login
    public function onUserLogin($event)
    {
        \Log::info('onUserLogin');
        \Log::info($event->user->id);
    }
    public function onUserLogout($event)
    {
        \Log::info('onUserLogout');
        \Log::info($event->user->id);
    }

    public function orderShipped($event)
    {
        \Log::info('subscribe a orderShipped');
    }
    public function subscribe($event)
    {

            $event->listen(
                'App\Events\UserEvent',
                'App\Listeners\UserEventSubscriber@onUserLogin'
            );
            $event->listen(
                'App\Events\UserEvent',
                'App\Listeners\UserEventSubscriber@onUserLogout'
            );


            $event->listen(
                'App\Events\OrderShipped',
                'App\Listeners\UserEventSubscriber@orderShipped'
            );

    }
}