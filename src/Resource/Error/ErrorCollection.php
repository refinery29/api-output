<?php

namespace Refinery29\ApiOutput\Resource\Error;

use Refinery29\ApiOutput\Serializer\HasSerializer;

class ErrorCollection implements HasSerializer
{
    private $errors = [];

    public function __construct(array $errors = null)
    {
        foreach ($errors as $error) {
            if (!$error instanceof Error) {
                throw new \Exception('Error Collections may only contain errors');
            }
        }

        $this->errors = $errors;
    }


    public function addError(Error $error)
    {
        $this->errors[] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getSerializer()
    {
        return new \Refinery29\ApiOutput\Serializer\Error\ErrorCollection($this);
    }
}
