<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ServiceFormSubmitted extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Service Form Submission')
                    ->greeting('Hello,')
                    ->line('A new service form has been submitted with the following details:')
                    ->line('Name: ' . $this->data['name'])
                    ->line('Email: ' . $this->data['email'])
                    ->line('Phone: ' . $this->data['phone_number'])
                    ->line('Company Name: ' . $this->data['company_name'])
                    ->line('Website: ' . $this->data['website'])
                    ->line('Budget: ' . $this->data['budget'])
                    ->line('Service: ' . $this->data['service'])
                    ->line('Additional Comments: ' . $this->data['comment'])
                    ->line('Thank you for using our service!');
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
