<?php declare(strict_types=1);
namespace FeedIo;

use FeedIo\Reader\Document;
use FeedIo\Rule\DateTimeBuilder;
use FeedIo\Rule\DateTimeBuilderInterface;

abstract class StandardAbstract
{

    /**
     * DateTime default format
     */
    const DATETIME_FORMAT = \DateTime::RFC2822;

    /**
     * Supported format
     */
    const SYNTAX_FORMAT = '';

    protected array $mandatoryFields = [];
    protected DateTimeBuilderInterface $dateTimeBuilder;

    public function __construct(
        DateTimeBuilderInterface $dateTimeBuilder
    ) {
        $this->dateTimeBuilder = $dateTimeBuilder;
    }

    /**
     * Tells if the parser can handle the feed or not
     * @param  Document $document
     * @return boolean
     */
    abstract public function canHandle(Document $document) : bool;

    /**
     * @return \FeedIo\FormatterInterface
     */
    abstract public function getFormatter() : FormatterInterface;

    /**
     * @return string
     */
    public function getDefaultDateFormat() : string
    {
        return static::DATETIME_FORMAT;
    }

    /**
     * @return array
     */
    public function getMandatoryFields() : array
    {
        return $this->mandatoryFields;
    }

    /**
     * Returns the Format supported by the standard (XML, JSON, Text...)
     * @return string
     */
    public function getSyntaxFormat() : string
    {
        return static::SYNTAX_FORMAT;
    }
}
