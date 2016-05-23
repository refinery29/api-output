<?php

namespace Refinery29\ApiOutput\Resource\ToplessResult;

use Refinery29\ApiOutput\Serializer\HasSerializer;

class ToplessResult implements HasSerializer
{
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
        return new \Refinery29\ApiOutput\Serializer\ToplessResult\ToplessResult($this);
    }
}
