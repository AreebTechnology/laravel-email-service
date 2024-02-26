<?php

namespace Areeb\EmailService\Classes;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class Attachments implements Arrayable
{
    private Collection $attachments;

    public function __construct()
    {
        $this->attachments = collect();
    }

    public static function instance(): self
    {
        return new self();
    }

    public function addFile($fileName, $fileUrl): self
    {
        $this->attachments->put($fileName, base64_encode(file_get_contents($fileUrl, true)));
        return $this;
    }

    public function toArray(): array
    {
        return $this->attachments->toArray();
    }
}
