<?php

namespace Refinery29\ApiOutput\Serializer;

use Refinery29\ApiOutput\Resource\Result as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;

class Result implements TopLevelResource
{
    /**
     * @var Input|HasSerializer
     */
    private $result;

    public function __construct(HasSerializer $serializer)
    {
        if (!$serializer instanceof Input) {
            throw new \Exception('Incorrect Resource Passed');
        }

        $this->result = $serializer;
    }

    /**
     * @return array
     */
    public function getOutput()
    {
        return $this->result->getData();
    }

    /**
     * @return string
     */
    public function getTopLevelName()
    {
        return 'result';
    }
}
