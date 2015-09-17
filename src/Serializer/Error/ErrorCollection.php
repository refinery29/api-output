<?php namespace Refinery29\ApiOutput\Serializer\Error;

use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;
use Refinery29\ApiOutput\TopLevelResource;

class ErrorCollection implements Serializer, TopLevelResource
{

    /**
     * @var \Refinery29\ApiOutput\Resource\Error\ErrorCollection
     */
    protected $resource;

    /**
     * @param HasSerializer $serializer
     * @throws \Exception
     */
    public function __construct(HasSerializer $serializer)
    {
        if (!$serializer instanceof \Refinery29\ApiOutput\Resource\Error\ErrorCollection) {
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