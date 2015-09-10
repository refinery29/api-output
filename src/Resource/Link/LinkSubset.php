<?php

namespace Refinery29\ApiOutput\Resource\Link;

use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Link\LinkSubset as Serializer;

class LinkSubset implements HasSerializer
{
    use HasLinks;

    /**
     * @var string
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getSerializer()
    {
        return new Serializer($this);
    }
}
