# Areeb mail service

This package adds state support to models.

To give you a feel about how this package can be used, let's look at a quick example.

## Installation

You can install the package via composer:

```bash
composer require areeb/email-service
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Areeb\EmailService\EmailServiceServiceProvider" --tag="email-service-config"
```

```php
use Areeb\EmailService\Contracts\EmailReceiverAble;
use Areeb\EmailService\Traits\HasEmailReceiver;

class User extends Model implements EmailReceiverAble
{
    use HasEmailReceiver;

}
```

```php
<?php

use Areeb\EmailService\Channels\MailServiceChannel;
use Areeb\EmailService\Classes\Attachments;
use Areeb\EmailService\Contracts\EmailServiceAble;
use Areeb\EmailService\DTO\EmailDTO;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificationClass extends \Illuminate\Auth\Notifications\VerifyEmail implements ShouldQueue, EmailServiceAble
{
    use Queueable;

    public function via($notifiable)
    {

        return [MailServiceChannel::class];
    }

    protected function buildMailMessage($url)
    {
        return (new MailMessage())
            ->subject('Welcome!')
            ->markdown('emails.verify', ['url' => $url]);
    }

    public function toMailService($notifiable, EmailServiceAble $notification): EmailDTO
    {

        $attachments = Attachments::instance();
        $attachments -> addFile('test.png',
            'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png');

        $emailTemplate = new VerifyEmailTemplate();

        return EmailDTO::instance(
            subject: __('notification.verify-email'),
            template: $emailTemplate,
            to: $notifiable,
            attachments: $attachments
        );
    }
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
