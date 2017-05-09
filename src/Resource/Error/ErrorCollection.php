<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Resource\Error;

use Refinery29\ApiOutput\Serializer\Error\ErrorCollection as Serializer;
use Refinery29\ApiOutput\Serializer\HasSerializer;

class ErrorCollection implements HasSerializer
{
    /**
     * @var Error[]
     */
    private $errors = [];

    /**
     * @param Error[] $errors
     *
     * @throws \Exception
     */
    public function __construct(array $errors = [])
    {
        foreach ($errors as $error) {
            if (!$error instanceof Error) {
                throw new \Exception('Error Collections may only contain errors');
            }
        }

        $this->errors = $errors;
    }

    /**
     * @param Error $error
     */
    public function addError(Error $error)
    {
        $this->errors[] = $error;
    }

    /**
     * @return Error[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return Serializer
     */
    public function getSerializer()
    {
        return new Serializer($this);
    }
}
