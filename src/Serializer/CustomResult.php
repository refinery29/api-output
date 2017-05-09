<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Serializer;

use Refinery29\ApiOutput\Resource\CustomResult as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;

class CustomResult implements TopLevelResource
{
    /**
     * @var Input
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
        return '';
    }
}
