<?php

namespace Refinery29\ApiOutput\Serializer\Link;

use Refinery29\ApiOutput\Resource\Link\LinkCollection as Input;
use Refinery29\ApiOutput\Serializer\HasArrayComponent;
use Refinery29\ApiOutput\Serializer\Serializer;

class LinkCollection implements Serializer
{
    use HasArrayComponent;

    protected $linkCollection;

    public function __construct(Input $linkCollection)
    {
        $this->linkCollection = $linkCollection;
    }

    public function getOutput()
    {
        if ($this->linkCollection->hasSubsets()) {
            $output = $this->processArray($this->linkCollection->getSubsets());

            return json_encode(['links' => $output], JSON_UNESCAPED_SLASHES);
        }

        if ($this->linkCollection->hasLinks()) {
            $output = $this->processArray($this->linkCollection->getLinks());

            return json_encode(['links' => $output], JSON_UNESCAPED_SLASHES);
        }
    }
}
