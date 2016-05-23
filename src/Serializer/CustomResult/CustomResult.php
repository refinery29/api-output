<?php

namespace Refinery29\ApiOutput\Serializer\CustomResult;

use Refinery29\ApiOutput\Resource\CustomResult\CustomResult as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\HasSerializer;

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
