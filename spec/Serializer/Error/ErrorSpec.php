<?php

namespace spec\Refinery29\ApiOutput\Serializer\Error;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;

class ErrorSpec extends ObjectBehavior
{
    public function it_must_pass_error()
    {
        $this->shouldThrow(\Exception::class)->duringInstantiation(Link::createFirst('http'));
    }
}
