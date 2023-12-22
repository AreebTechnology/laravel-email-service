<?php

namespace Areeb\EmailService\DTO;

use Areeb\EmailService\Classes\Config;
use Areeb\EmailService\Contracts\EmailReceiverAble;
use Illuminate\Support\Collection;

class EmailDTO
{

    public Collection $toCollection;
    public ?Collection $ccCollection = null;
    public ?Collection $bccCollection = null;

    public function __construct(
        public string             $subject,
        public EmailTemplateDTO   $template,
        public EmailReceiverAble  $to,
        public ?EmailReceiverAble $cc = null,
        public ?EmailReceiverAble $bcc = null,
    )
    {
        $this->toCollection = collect();
        $this->ccCollection = collect();
        $this->bccCollection = collect();

    }

    public static function instance(
        string             $subject,
        EmailTemplateDTO   $template,
        EmailReceiverAble  $to,
        ?EmailReceiverAble $cc = null,
        ?EmailReceiverAble $bcc = null,
    ): EmailDTO
    {
        return new self(
            $subject,
            $template,
            $to,
            $cc,
            $bcc
        );
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function template(): array
    {
        return [
            "id" => $this->template->id(),
            "variables" => $this->template->variables()
        ];
    }

    public function from(): array
    {
        return [
            "name" => Config::get('from.name'),
            "email" => Config::get('from.email')
        ];
    }

    public function to(): array
    {
        return $res = $this->toCollection?->add(['email' => $this->to?->email(), 'name' => $this->to?->name()])
            ->filter(function ($item) {
                if (!filter_var($item['email'], FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
                return true;
            })->toArray();
    }

    public function cc(): null|array
    {
        return $res = $this->ccCollection?->add(['email' => $this->cc?->email(), 'name' => $this->cc?->name()])
            ->filter(function ($item) {
                if (!filter_var($item['email'], FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
                return true;
            })->toArray();
    }

    public function bcc(): null|array
    {
        return $res = $this->bccCollection?->add(['email' => $this->bcc?->email(), 'name' => $this->bcc?->name()])
            ->filter(function ($item) {
                if (!filter_var($item['email'], FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
                return true;
            })->toArray();
    }

}
