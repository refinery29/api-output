<?php


namespace Refinery29\ApiOutput\Resource\Link;


trait HasLinks
{
    /**
     * @var Link[].
     */
    protected $links = [];

    /**
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param string $link
     */
    public function addLink($link)
    {
        $this->links[] = $link;
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

    public function hasLinks()
    {
        return !empty($this->links);
    }
}