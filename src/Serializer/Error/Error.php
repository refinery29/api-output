<?php

namespace Refinery29\ApiOutput\Serializer\Error;

use Refinery29\ApiOutput\Resource\Error\Error as Input;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;

class Error implements Serializer
{
    public function __construct(HasSerializer $error)
    {
        if (!$error instanceof Input) {
            throw new \Exception('Incorrect Serializer passed');
        }

        $this->resource = $error;
    }

    public function getOutput()
    {
        // TODO: Implement getOutput() method.
    }

    /**
     * @return string
     */
    public function asJson()
    {
        return json_encode($this->getOutput(), JSON_UNESCAPED_SLASHES);
    }
}
