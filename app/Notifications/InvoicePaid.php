<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use function print_r;
use function url;
use Illuminate\Notifications\Messages\BroadcastMessage;

class InvoicePaid extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        \Log::info('send_mesage to array');
        return [
            //
            'message' => 'A new post was published on laravel  News',
            'action' => 'database',
        ];
    }

    public function toDatabase()
    {
        \Log::info('send_massage to database');
        return [
            'message' => 'A new post was published on laravel  News',
            'action' => 'database',
        ];
    }

    //广播通知
    public function toBroadcast($notifiable)
    {
        \Log::info('broadcat message');
        return (new BroadcastMessage([
            'invoker' => 'aoa',
            'amount' => 'dff'
        ]))->onConnection('database');
    }
    public function toVoice($notifiable)
    {
        // ...
    }
}
