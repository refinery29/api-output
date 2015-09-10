<?php

namespace Refinery29\ApiOutput\Resource\Link;

use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Link\LinkCollection as Serializer;

class LinkCollection implements HasSerializer
{
    /**
     * @var LinkSubset[]
     */
    protected $subsets =[];

    /**
     * @var Link[]
     */
    private $links = [];

    /**
     * @param Link $link
     */
    public function addLink(Link $link)
    {
        $this->links[] = $link;
    }

    /**
     * @param Link $compared
     * @return bool
     */
    public function hasLink(Link $compared)
    {
        foreach ($this->links as $link) {
            if ($this->linksMatch($link, $compared)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Link $one
     * @param Link $two
     * @return bool
     */
    private function linksMatch(Link $one, Link $two)
    {
        return ($one->getHref() == $two->getHref()
            && $one->getMeta() == $two->getMeta());
    }

    /**
     * @return Link[]
     */
    public function getLinks()
    {
        return $this->links;
    }

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

    public function hasLinks()
    {
        return !empty($this->links);
    }

    public function getSerializer()
    {
        return new Serializer($this);
    }
}
