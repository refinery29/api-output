<?php

namespace Refinery29\ApiOutput\Serializer\Error;

use Refinery29\ApiOutput\Resource\Error\Error as Input;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;
use Refinery29\ApiOutput\TopLevelResource;

class Error implements Serializer, TopLevelResource
{
    protected $resource;

    public function __construct(HasSerializer $error)
    {
        if (!$error instanceof Input) {
            throw new \Exception('Incorrect Serializer passed');
        }

        $this->resource = $error;
    }

    public function getOutput()
    {
        $error = [
            'title' => $this->resource->getTitle(),
            'code' => $this->resource->getCode(),
        ];

        if ($this->resource->getDetail()) {
            $error['detail'] = $this->resource->getDetail();
        }

        if ($this->resource->getId()) {
            $error['detail'] = $this->resource->getId();
        }

        if ($this->resource->getLinks()->hasLinks()) {
            $error['links'] = $this->resource->getLinks()->getSerializer()->getOutput();
        }

        return (object) $error;
    }

    /**
     * @return string
     */
    public function asJson()
    {
        return json_encode($this->getOutput(), JSON_UNESCAPED_SLASHES);
    }

    /**
     * @return string
     */
    public function getTopLevelName()
    {
        return 'errors';
    }
}