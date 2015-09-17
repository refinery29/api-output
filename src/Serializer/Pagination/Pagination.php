<?php

namespace Refinery29\ApiOutput\Serializer\Pagination;

use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Pagination\Pagination as Input;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;
use Refinery29\ApiOutput\TopLevelResource;

class Pagination implements TopLevelResource, Serializer
{
    public function __construct(HasSerializer $serializer)
    {
        if (!$serializer instanceof Input) {
            throw new \Exception('Invalid Resource provided for serializer');
        }

        $this->resource = $serializer;
    }

    public function getTopLevelName()
    {
        return "pagination";
    }
    public function getOutput()
    {
        $output = new \stdClass();
        foreach ($this->resource->getLinks() as $link) {
            $this->buildSimpleLink($output, $link);
        }
        return $output;
    }

    /**
     * @param $output
     * @param Link $link
     * @return \stdClass
     */
    public function buildSimpleLink($output, Link $link)
    {
        $name = $link->getName();

        $output->$name = $link->getHref();

        return $output;
    }
}