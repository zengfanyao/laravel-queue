<?php
namespace App\Channels;
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 17/7/4
 * Time: 下午6:01
 */
use Illuminate\Notifications\Notification;
class TestChannel
{
    public function send($notifiable,Notification $notification)
    {
        $message = $notification->toVoice($notifiable);
    }

}