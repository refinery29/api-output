<?php

namespace Refinery29\ApiOutput\Serializer;

use Refinery29\ApiOutput\Resource\Result as Input;
use Refinery29\ApiOutput\TopLevelResource;

class Result implements Serializer, TopLevelResource
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
        return (object) $this->result->getData();
    }

    public function getTopLevelName()
    {
        return 'result';
    }
}
