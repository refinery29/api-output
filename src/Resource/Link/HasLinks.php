<?php

namespace Refinery29\ApiOutput\Resource\Link;

trait HasLinks
{
    /**
     * @var Link[]
     */
    protected $links = [];

    /**
     * @return Link[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param Link $link
     */
    public function addLink(Link $link)
    {
        $this->links[] = $link;
    }

    /**
     * @param Link $one
     * @param Link $two
     *
     * @return bool
     */
    private function linksMatch(Link $one, Link $two)
    {
        return $one->getHref() == $two->getHref()
            && $one->getName() == $two->getName();
    }

    /**
     * @param Link $compared
     *
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
     * @return bool
     */
    public function hasLinks()
    {
        return !empty($this->links);
    }
}
