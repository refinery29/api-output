<?php

namespace Refinery29\ApiOutput\Serializer\Link;

use Exception;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection as Input;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;
use Refinery29\ApiOutput\TopLevelResource;

class LinkCollection implements Serializer, TopLevelResource
{
    /**
     * @var Input
     */
    protected $resource;

    /**
     * @param HasSerializer $linkCollection
     *
     * @throws Exception
     */
    public function __construct(HasSerializer $linkCollection)
    {
        if (! $linkCollection instanceof Input) {
            throw new Exception('Incorrect Serializer passed');
        }
        $this->resource = $linkCollection;
    }

    /**
     * @return \stdClass
     */
    public function getOutput()
    {
        foreach ($this->resource->getLinks() as $link) {
            if ($link->getMeta()) {
                return $this->buildMetaLink($link);
            }

            return $this->buildSimpleLink($link);
        }
    }

    /**
     * @return string
     */
    public function getTopLevelName()
    {
        return 'links';
    }

    /**
     * @param Link $link
     *
     * @return \stdClass
     */
    public function buildSimpleLink(Link $link)
    {
        $name = $link->getName();

        $output = new \stdClass();
        $output->$name = $link->getHref();

        return $output;
    }

    /**
     * @param Link $link
     *
     * @return \stdClass
     */
    public function buildMetaLink(Link $link)
    {
        $name = $link->getName();

        $output = new \stdClass();
        $output->$name = new \stdClass();
        $output->$name->href = $link->getHref();
        $output->$name->meta = (object) $link->getMeta();

        return $output;
    }
}
