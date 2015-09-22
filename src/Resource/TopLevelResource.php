<?php

namespace Refinery29\ApiOutput\Resource;

use Refinery29\ApiOutput\Serializer\Serializer;

interface TopLevelResource extends Serializer
{
    public function getTopLevelName();
}
