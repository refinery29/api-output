<?php


namespace Refinery29\ApiOutput\Resource\Link;


trait HasLinks
{
    /**
     * @var LinkCollection URLs to documentation or resources that may help the client developer in troubleshooting.
     */
    protected $links;

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
        $this->links->addLink($link);
    }
}