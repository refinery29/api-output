<?php

namespace Refinery29\ApiOutput\Serializer;

use Refinery29\ApiOutput\Resource\CustomResult as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;


class CustomResult implements TopLevelResource
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
