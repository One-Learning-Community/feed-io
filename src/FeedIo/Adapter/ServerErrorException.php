<?php declare(strict_types=1);

namespace FeedIo\Adapter;

use \Psr\Http\Message\ResponseInterface;

class ServerErrorException extends HttpRequestException
{
    protected ResponseInterface $response;

    public function __construct(
        ResponseInterface $response,
        float $duration = 0
    ) {
        $this->response = $response;
        parent::__construct(
            'internal server error',
            $duration
        );
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
