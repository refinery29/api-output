<?php

namespace Refinery29\ApiOutput\Resource\Link;

class Link
{
    /**
     * @var string
     */
    protected $href;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string | null
     */
    protected $meta = null;

    /**
     * @param string      $href
     * @param string|null $name
     */
    private function __construct($name, $href, $meta = null)
    {
        $this->href = $href;
        $this->name = $name;
        $this->meta = $meta;
    }

    public static function createSelf($href, $meta = null)
    {
        return new self('self', $href, $meta);
    }

    public static function createRelated($href, $meta = null)
    {
        return new self('related', $href, $meta);
    }

    public static function createPrev($href, $meta = null)
    {
        return new self('prev', $href, $meta);
    }

    public static function createNext($href, $meta = null)
    {
        return new self('next', $href, $meta);
    }

    public static function createFirst($href, $meta = null)
    {
        return new self('first', $href, $meta);
    }

    public static function createLast($name, $href, $meta = null)
    {
        return new self('last', $href, $meta);
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @return null|string
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
