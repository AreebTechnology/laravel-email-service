<?php

namespace Areeb\EmailService\Contracts;

use Areeb\EmailService\DTO\EmailDTO;

interface EmailService
{
    public function sendEmail(EmailDTO $emailServiceDTO): void;

}
