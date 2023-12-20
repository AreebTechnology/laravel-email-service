<?php

namespace Areeb\EmailService\Clients\SendPulse;

use Areeb\EmailService\Classes\Config;
use Areeb\EmailService\DTO\EmailDTO;
use Illuminate\Support\Collection;

class SmtpRequest extends SendPulseClient
{
    public function sendEmail(EmailDTO $emailServiceDTO): Collection
    {
        return $this->post("/smtp/emails", [
            "email" => [
                "subject" => "Test",
                "template" => [
                    "id" => $emailServiceDTO->template->id(),
                    "variables" => $emailServiceDTO->template->variables()
                ],
                "from" => [
                    "name" => Config::get('from.name'),
                    "email" => Config::get('from.email')
                ],
                "to" => $emailServiceDTO->to,
                "cc" => $emailServiceDTO->cc,
                "bcc" => $emailServiceDTO->bcc
            ]
        ]);
    }

}
