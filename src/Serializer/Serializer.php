<?php

namespace Refinery29\ApiOutput\Serializer;

interface Serializer
{
    public function __construct(HasSerializer $serializer);

    public function getOutput();
}
