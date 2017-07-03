<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Queue\Queue;

class TestJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testjob';
    protected $user;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        for($i = 1; $i < 5; $i ++) {
            $user=\App\User::findOrFail($i);
            //Queue::push(new \App\Jobs\SendReminderEmail($user));
            dispatch(new \App\Jobs\SendReminderEmail($user));
        }

    }
}
