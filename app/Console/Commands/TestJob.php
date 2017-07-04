<?php

namespace App\Console\Commands;

use App\Jobs\SendReminderEmail;
use function dispatch;
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
        //分发任务到指定连接
        for ($i=1;$i<4;$i++)
        {
            $user=\App\User::findOrFail($i);
            $job=(new \App\Jobs\SendReminderEmail($user))->onConnection('database');
            dispatch($job);
            \Log::info('分发任务到队列'.$i);
        }

    }
}
