<?php

namespace App\Http\Controllers;

use App\Events\OrderShipped;


use App\Events\UserEvent;

use App\Jobs\SendReminderEmail;
use App\Notifications\InvoicePaid;
use function dd;
use function event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use function print_r;

class TestController extends Controller
{
    //
    public function testJob()
    {
           $user= \App\User::find(1);
           $user->notify(new InvoicePaid());//发送通知
//           foreach ($user->notifications as $notification)
//           {
//               $notification->markAsRead();
//           }
           return '222';
    }

    public function ship()
    {
        $user=\App\User::findOrFail(1);
        event(new OrderShipped($user));
        return 'done';
    }

    public function subscribe()
    {
        $user=\App\User::findOrFail(2);
        $userevent=new UserEvent($user);
        event($userevent);

        event(new OrderShipped($user));
    }

    public function convert()
    {
        \App\Logic\PdftopictureLogic::pdftopicture();
    }
}
