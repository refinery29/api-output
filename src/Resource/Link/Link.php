<?php

namespace Refinery29\ApiOutput\Resource\Link;

use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Link\Link as Serializer;

class Link implements HasSerializer
{
    /**
     * @var string
     */
    protected $href;

    /**
     * @var string | null
     */
    protected $meta;

    /**
     * @param string      $href
     * @param string|null $meta
     */
    public function __construct($href, $meta = null)
    {
        $this->href = $href;
        $this->meta = $meta;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @return string
     */
    public function getMeta()
    {
        return $this->meta;
    }

    public function getSerializer()
    {
        return new Serializer($this);
    }
}
