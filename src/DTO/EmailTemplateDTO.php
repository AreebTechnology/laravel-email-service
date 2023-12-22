<?php

namespace Areeb\EmailService\DTO;

interface   EmailTemplateDTO
{
    public function id(): string;

    public function variables(): array;
}
