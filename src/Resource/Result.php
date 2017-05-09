<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Resource;

use Refinery29\ApiOutput\Serializer\HasSerializer;

class Result implements HasSerializer
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getSerializer()
    {
        return new \Refinery29\ApiOutput\Serializer\Result($this);
    }
}
