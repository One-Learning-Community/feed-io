<?php

namespace FeedIo\Adapter;

use FeedIo\FeedIoException;

class HttpRequestException extends FeedIoException
{
    protected float $duration = 0;

    public function __construct(
        string $message = '',
        float $duration = 0
    ) {
        $this->duration = $duration;
        parent::__construct($message);
    }

    public function getDuration(): float
    {
        return $this->duration;
    }
}
