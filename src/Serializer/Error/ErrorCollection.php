<?php

namespace Refinery29\ApiOutput\Serializer\Error;

use Refinery29\ApiOutput\Resource\Error\ErrorCollection as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\HasSerializer;

class ErrorCollection implements TopLevelResource
{
    /**
     * @var Input
     */
    protected $resource;

    /**
     * @param HasSerializer $serializer
     *
     * @throws \Exception
     */
    public function __construct(HasSerializer $serializer)
    {
        if (!$serializer instanceof Input) {
            throw new \Exception('Invalid Resource provided for serailzer');
        }

        $this->resource = $serializer;
    }

    /**
     * @return string
     */
    public function getTopLevelName()
    {
        return 'errors';
    }

    /**
     * @return array
     */
    public function getOutput()
    {
        $output = [];

        foreach ($this->resource->getErrors() as $error) {
            $output[] = $error->getSerializer()->getOutput();
        }

        return $output;
    }
}
