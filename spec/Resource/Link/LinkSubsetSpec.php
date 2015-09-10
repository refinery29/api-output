<?php

namespace spec\Refinery29\ApiOutput\Resource\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Serializer\Link\LinkSubset as Serializer;
use Refinery29\ApiOutput\Resource\Link\LinkSubset;

class LinkSubsetSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('resources');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(LinkSubset::class);
    }

    function it_can_set_name()
    {
        $this->getName()->shouldReturn('resources');
    }

    function it_can_get_serializer()
    {
        $this->getSerializer()->shouldHaveType(Serializer::class);
    }
}
