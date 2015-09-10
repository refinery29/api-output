<?php

namespace Refinery29\ApiOutput\Serializer\Link;

use Refinery29\ApiOutput\Resource\Link\Link as Input;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;
use Symfony\Component\Config\Definition\Exception\Exception;

class Link implements Serializer
{
    public function __construct(HasSerializer $link)
    {
        if (! $link instanceof Input){
            throw new Exception("Incorrect Serializer passed");
        }
        $this->link = $link;
    }

    public function getOutput()
    {
        if ($this->link->getMeta()) {
            return $this->buildLinkObject();
        }

        return '{' . $this->link->getHref() . '}';
    }

    private function buildLinkObject()
    {
        $obj = new \stdClass();
        $obj->href = $this->link->getHref();
        $obj->meta = $this->link->getMeta();

        return json_encode($obj, JSON_UNESCAPED_SLASHES);
    }
}
