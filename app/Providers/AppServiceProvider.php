<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Queue::before(function (JobProcessing $event) {
            // $event->connectionName
            \Log::info('process before');
            \Log::info($event->connectionName);
            // $event->job->payload()
        });

        Queue::after(function (JobProcessed $event) {
            \Log::info('process after');
            \Log::info($event->connectionName);
            // $event->connectionName
            // $event->job
            // $event->job->payload()
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
