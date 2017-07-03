<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function testJob()
    {
        $user=\App\User::findOrFail(1);

       $this->dispatch(new SendReminderEmail($user));
        return 'done';
    }
}
