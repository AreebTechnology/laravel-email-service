<?php

namespace Areeb\EmailService\Contracts;

interface EmailReceiverAble
{

    public function emailToEmailService(): string;

    public function nameToEmailService(): string;

}
