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
                "subject" => $emailServiceDTO->subject,
                "template" => [
                    "id" => $emailServiceDTO->template->id(),
                    "variables" => $emailServiceDTO->template->variables()
                ],
                "from" => [
                    "name" => Config::get('from.name'),
                    "email" => Config::get('from.email')
                ],
                "to" => [
                    ['email' => $emailServiceDTO->to->email(), 'name' => $emailServiceDTO->to->name()]
                ],
                "cc" => [
                    ['email' => $emailServiceDTO->to->email(), 'name' => $emailServiceDTO->to->name()]
                ],
                "bcc" => [
                    ['email' => $emailServiceDTO->to->email(), 'name' => $emailServiceDTO->to->name()]
                ]
            ]
        ]);
    }

}
