<?php

namespace Refinery29\ApiOutput\Serializer\Link;

use Exception;
use Refinery29\ApiOutput\Resource\Link\LinkSubset as Input;
use Refinery29\ApiOutput\Serializer\HasArrayComponent;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;

class LinkSubset implements Serializer
{
    use HasArrayComponent;

    protected $subset;

    public function __construct(HasSerializer $subset)
    {
        if (! $subset instanceof Input){
            throw new Exception("Incorrect Serializer passed");
        }
        $this->subset = $subset;
    }

    public function getOutput()
    {
        if ($this->subset->hasLinks()) {
            $output = $this->processArray($this->subset->getLinks());

            return json_encode([$this->subset->getName() => $output], JSON_UNESCAPED_SLASHES);
        }
    }
}
