<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class ClientNotification extends Notification implements ShouldQueue
{
    use Queueable;


    private $clientName;
    private $message;
    private $id_client;
    private $meeting;
    
    public function __construct($clientName, $message, $id_client, $meeting)
    {
        $this->clientName = $clientName;
        $this->message = $message;
        $this->id_client = $id_client;
        $this->meeting = $meeting;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase()
    {
        return [
            'client'     => $this->clientName,
            'message'    => $this->message,
            'id_client'  => $this->id_client,
            'meeting'    => $this->meeting,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
