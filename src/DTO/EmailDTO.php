<?php

namespace Areeb\EmailService\DTO;

use Areeb\EmailService\Contracts\EmailReceiverAble;

class EmailDTO
{
    public function __construct(
        public string           $subject,
        public EmailTemplateDTO $template,
        public EmailReceiverAble $to,
        public ?EmailReceiverAble           $cc = null,
        public ?EmailReceiverAble           $bcc = null,
    ) {

    }

    public static function instance(
        string           $subject,
        EmailTemplateDTO $template,
        EmailReceiverAble $to,
        ?EmailReceiverAble           $cc = null,
        ?EmailReceiverAble           $bcc = null,
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
