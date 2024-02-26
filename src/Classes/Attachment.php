<?php

namespace Areeb\EmailService\Classes;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class Attachment implements Arrayable
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

    public function addFromUrl($fileName, $fileUrl): self
    {
        $this->attachments->put($fileName, stream_get_contents($fileUrl));
        return $this;
    }

    public function addFromPath($fileName, $filePath): self
    {
        $this->attachments->put($fileName, file_get_contents($filePath));
        return $this;
    }

    public function toArray(): array
    {
        return $this->attachments->toArray();
    }
}
