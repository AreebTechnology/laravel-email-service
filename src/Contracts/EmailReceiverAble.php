<?php

namespace Areeb\EmailService\Contracts;

interface EmailReceiverAble
{

    public function email(): string;

    public function name(): string;

}
