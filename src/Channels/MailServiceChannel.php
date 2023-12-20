<?php

namespace Areeb\EmailService\Channels;

use Areeb\EmailService\Contracts\EmailService;
use Areeb\EmailService\Contracts\EmailServiceAble;
use Illuminate\Notifications\Notification;

class MailServiceChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void
     */
    public function send(mixed $notifiable, EmailServiceAble $notification)
    {
        app(EmailService::class)->sendEmail($notification->toMailService($notifiable, $notification));
    }
}
