<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmailNotification extends VerifyEmail
{
    use Queueable;

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->view('email.custom_verify_email', ['url' => $this->verificationUrl($notifiable)]);
    }
}