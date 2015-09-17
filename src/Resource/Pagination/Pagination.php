<?php

namespace Refinery29\ApiOutput\Resource\Pagination;

use Refinery29\ApiOutput\Resource\Link\HasLinks;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Pagination\Pagination as Serializer;

class Pagination implements HasSerializer
{
    use HasLinks;

    public function addFirst($href)
    {
        $this->addLink(Link::createFirst($href));
    }

    public function addLast($href)
    {
        $this->addLink(Link::createLast($href));
    }

    public function addPrevious($href)
    {
        $this->addLink(Link::createPrev($href));
    }

    public function addNext($href)
    {
        $this->addLink(Link::createNext($href));
    }

    public function getSerializer()
    {
        return new Serializer($this);
    }
}
