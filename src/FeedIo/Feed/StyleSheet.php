<?php declare(strict_types=1);

namespace FeedIo\Feed;

class StyleSheet
{
    const DEFAULT_TYPE = 'text/xsl';
    protected string $href;
    protected string $type = self::DEFAULT_TYPE;

    public function __construct(
        string $href,
        string $type = self::DEFAULT_TYPE
    ) {
        $this->type = $type;
        $this->href = $href;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
