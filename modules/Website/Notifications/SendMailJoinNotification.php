<?php

namespace Modules\Website\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendMailJoinNotification extends Notification
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
        $mailMessage = (new MailMessage)
        ->subject('New Contact Form Submission')
        ->greeting('Hello,')
        ->line('A new contact form submission has been received.')
        ->line('Here are the details:')
        ->line('**Name**: ' . $this->data['name'])
        ->line('**Email**: ' . $this->data['email'])
        ->line('**Phone**: ' . $this->data['phone'])
        ->line('**Qualification**: ' . $this->data['qualification'])
        ->line('**Job**: ' . $this->data['job'])
        ->line('**City**: ' . $this->data['city'])
        ->line('**Years of Experience**: ' . $this->data['experience'])
        ->line('**Subject**: ' . $this->data['subject'])
        ->line('**Message**:')
        ->line($this->data['message']);

    // Attach the CV if uploaded
    if (!empty($this->data['activity_file'])) {
        $mailMessage->line('**Attached File**: ' . url($this->data['activity_file']) );
    }

    return $mailMessage;
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
