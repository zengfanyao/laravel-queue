<?php

namespace App\Http\Controllers;

use App\Events\OrderShipped;
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
        $user=\App\User::find(1);
        event(new OrderShipped($user));
    }
}
