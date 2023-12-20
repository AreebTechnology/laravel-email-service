<?php

namespace Areeb\EmailService\Classes;

class Config
{
    public static function get($key)
    {
        $emailService = config('email-service.service');

        return config("email-service.services.{$emailService}.{$key}");
    }
}
