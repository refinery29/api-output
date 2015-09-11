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
     * @var array
     */
    protected $meta = [];

    /**
     * @param string|null $name
     * @param string      $href
     */
    private function __construct($name, $href)
    {
        $this->href = $href;
        $this->name = $name;
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
     * @param string $name
     * @param string $value
     */
    public function addMeta($name, $value)
    {
        $this->meta[$name] = $value;
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
