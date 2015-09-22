<?php

namespace Refinery29\ApiOutput\Serializer\Link;

use Exception;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;

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
        $output = new \stdClass();

        foreach ($this->resource->getLinks() as $link) {
            if ($link->getMeta()) {
                $this->buildMetaLink($output, $link);
            } else {
                $this->buildSimpleLink($output, $link);
            }
        }

        return $output;
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
    public function buildSimpleLink($output, Link $link)
    {
        $name = $link->getName();

        $output->$name = $link->getHref();

        return $output;
    }

    /**
     * @param Link $link
     *
     * @return \stdClass
     */
    public function buildMetaLink($output, Link $link)
    {
        $name = $link->getName();

        $output->$name = new \stdClass();
        $output->$name->href = $link->getHref();
        $output->$name->meta = (object) $link->getMeta();

        return $output;
    }
}
