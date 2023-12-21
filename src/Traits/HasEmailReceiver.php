<?php

namespace Areeb\EmailService\Traits;

trait HasEmailReceiver
{

    public function email(): string
    {
        return $this->email ?? '';
    }

    public function name(): string
    {
        return $this->name ?? '';
    }
}
