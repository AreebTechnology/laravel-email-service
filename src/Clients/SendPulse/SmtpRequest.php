<?php

namespace Areeb\EmailService\Clients\SendPulse;

use Areeb\EmailService\DTO\EmailDTO;
use Illuminate\Support\Collection;

class SmtpRequest extends SendPulseClient
{
    public function sendEmail(EmailDTO $emailServiceDTO): Collection
    {
        return $this->post("/smtp/emails", [
            "email" => [
                "subject" => $emailServiceDTO->subject(),
                "template" => $emailServiceDTO->template(),
                "from" => $emailServiceDTO->from(),
                "to" => $emailServiceDTO->to(),
                "cc" => $emailServiceDTO->cc(),
                "bcc" => $emailServiceDTO->bcc()
            ]
        ]);
    }

}
