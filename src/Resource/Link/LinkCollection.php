<?php

namespace Refinery29\ApiOutput\Resource\Link;

use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Link\LinkCollection as Serializer;

class LinkCollection implements HasSerializer
{
    use HasLinks;

    /**
     * @return Serializer
     */
    public function getSerializer()
    {
        return new Serializer($this);
    }
}
