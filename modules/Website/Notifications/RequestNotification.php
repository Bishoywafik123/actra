<?php

namespace Modules\Website\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RequestNotification extends Notification
{
    use Queueable;
    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data=$data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('New Contact Form Submission')
        ->greeting('Hello,')
        ->line('A new contact form submission has been received.')
        ->line('Here are the details:')
        ->line('**Name**: ' . $this->data['name'])
        ->line('**Email**: ' . $this->data['email'])
        ->line('**Phone**: ' . $this->data['phone'])
        ->line('**country**: ' . $this->data['country'])
        ->line('**zone**: ' . $this->data['zone'])
        ->line('**subject**: ' . $this->data['subject'])
        ->line('**type activity**: ' . $this->data['type_activity'])
        ->line('**Message**:')
        ->line($this->data['message']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
