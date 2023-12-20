<?php

namespace Areeb\EmailService\DTO;

class EmailDTO
{
    public function __construct(
        public string           $subject,
        public EmailTemplateDTO $template,
        public array            $to,
        public ?array           $cc = null,
        public ?array           $bcc = null,
    ) {

    }

    public static function instance(
        string           $subject,
        EmailTemplateDTO $template,
        array            $to,
        ?array           $cc = null,
        ?array           $bcc = null,
    ): EmailDTO {
        return new self(
            $subject,
            $template,
            $to,
            $cc,
            $bcc
        );
    }

}
