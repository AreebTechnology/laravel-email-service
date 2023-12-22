<?php

namespace Areeb\EmailService\Traits;

trait HasEmailReceiver
{

    public function emailToEmailService(): string
    {
        return $this->email ?? '';
    }

    public function nameToEmailService(): string
    {
        return $this->name ?? '';
    }
}
