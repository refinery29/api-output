<?php

namespace Refinery29\ApiOutput\Resource\Link;

use Refinery29\ApiOutput\Serializer\Link\LinkSubset as Serializer;
use Refinery29\ApiOutput\Serializer\HasSerializer;

class LinkSubset implements HasSerializer
{
    use HasLinks;

    /**
     * @var string $name
     */
    protected $name;

    function __construct($name)
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
