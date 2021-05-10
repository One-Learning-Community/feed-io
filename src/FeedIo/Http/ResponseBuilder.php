<?php declare(strict_types=1);

namespace FeedIo\Http;

use FeedIo\FeedInterface;
use FeedIo\FormatterInterface;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class ResponseBuilder
{
    protected int $maxAge = 600;
    protected bool $public = true;

    /**
     * @param int $maxAge max-age in seconds
     * @param bool $public is the response public
     */
    public function __construct(
        int $maxAge = 600,
        bool $public = true
    ) {
        $this->public = $public;
        $this->maxAge = $maxAge;
    }

    /**
     * @param  string $format
     * @param  FormatterInterface $formatter
     * @param  FeedInterface $feed
     * @return ResponseInterface
     */
    public function createResponse(string $format, FormatterInterface $formatter, FeedInterface $feed) : ResponseInterface
    {
        $headers = [
            'Content-Type'  => ($format === 'json') ? 'application/json' : 'application/xhtml+xml',
            'Cache-Control' => ($this->public ? 'public' : 'private') . ", max-age={$this->maxAge}",
        ];

        // Feed could have no items
        if ($feed->getLastModified() instanceof \DateTime) {
            $headers['Last-Modified'] = $feed->getLastModified()->format(\DateTime::RSS);
        }

        return new Response(200, $headers, $formatter->toString($feed));
    }
}
