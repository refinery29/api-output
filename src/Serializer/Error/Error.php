<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Serializer\Error;

use Refinery29\ApiOutput\Resource\Error\Error as Input;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Serializer;

class Error implements Serializer
{
    /**
     * @var Input
     */
    protected $resource;

    public function __construct(HasSerializer $error)
    {
        if (!$error instanceof Input) {
            throw new \Exception('Incorrect Serializer passed');
        }

        $this->resource = $error;
    }

    /**
     * @return object
     */
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
            $error['id'] = $this->resource->getId();
        }

        if ($this->resource->getLinks()->hasLinks()) {
            $error['links'] = $this->resource->getLinks()->getSerializer()->getOutput();
        }

        return (object) $error;
    }
}
