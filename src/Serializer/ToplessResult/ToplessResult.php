<?php

namespace Refinery29\ApiOutput\Serializer\ToplessResult;

use Refinery29\ApiOutput\Resource\Result as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\HasSerializer;

class ToplessResult implements TopLevelResource
{
    private $result;

    public function __construct(HasSerializer $serializer)
    {
        if (! $serializer instanceof Input) {
            throw new \Exception('Incorrect Resource Passed');
        }

        $this->result = $serializer;
    }

    public function getOutput()
    {
        return $this->result->getData();
    }

    public function getTopLevelName()
    {
        return '';
    }
}
