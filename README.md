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

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
