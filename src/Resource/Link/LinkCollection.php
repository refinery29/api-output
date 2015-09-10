<?php

namespace Refinery29\ApiOutput\Resource\Link;

use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Link\LinkCollection as Serializer;

class LinkCollection implements HasSerializer
{
    use HasLinks;

    /**
     * @var LinkSubset[]
     */
    protected $subsets = [];

    /**
     * @param LinkSubset $subset
     */
    public function addSubset(LinkSubset $subset)
    {
        $this->subsets[] = $subset;
    }

    /**
     * @return LinkSubset[]
     */
    public function getSubsets()
    {
        return $this->subsets;
    }

    public function hasSubsets()
    {
        return !empty($this->subsets);
    }

    public function getSerializer()
    {
        return new Serializer($this);
    }
}
