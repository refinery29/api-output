<?php

namespace Refinery29\ApiOutput\Serializer\Link;

use Refinery29\ApiOutput\Resource\Link\LinkCollection as Input;

class LinkCollection
{
    protected $linkCollection;

    function __construct(Input $linkCollection)
    {
        $this->linkCollection = $linkCollection;
    }

    public function output()
    {
        if ($this->linkCollection->hasSubsets()) {
            $output = $this->processInput($this->linkCollection->getSubsets());

            return json_encode(['links' => $output]);
        }

        if ($this->linkCollection->hasLinks()){
            $output = $this->processInput($this->linkCollection->getLinks());

            return json_encode(['links' => $output]);
        }
    }

    private function processInput(array $input)
    {
        $output = [];

        foreach ($input as $subset){
            $output[] = $subset->getSerializer()->output();
        }

        return $output;
    }
}
