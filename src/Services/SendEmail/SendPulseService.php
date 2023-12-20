<?php

namespace Areeb\EmailService\Services\SendEmail;

use Areeb\EmailService\Clients\SendPulse\SmtpRequest;
use Areeb\EmailService\Contracts\EmailService;
use Areeb\EmailService\DTO\EmailDTO;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPulseService implements EmailService, ShouldQueue
{
    private SmtpRequest $smtpRequest;

    public function __construct()
    {
        $this->smtpRequest = new SmtpRequest();
    }

    public function sendEmail(EmailDTO $emailServiceDTO): void
    {

        $this->smtpRequest->sendEmail($emailServiceDTO);
    }
}
