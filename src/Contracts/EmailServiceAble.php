<?php

namespace Areeb\EmailService\Contracts;

use Areeb\EmailService\DTO\EmailDTO;

interface EmailServiceAble
{
    public function toMailService($notifiable, EmailServiceAble $notification): EmailDTO;

}
