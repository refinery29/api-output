<?php

namespace spec\Refinery29\ApiOutput\Resource\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\LinkSubset;
use Refinery29\ApiOutput\Serializer\Link\LinkSubset as Serializer;

class LinkSubsetSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('resources');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LinkSubset::class);
    }

    public function it_can_set_name()
    {
        $this->getName()->shouldReturn('resources');
    }

    public function it_can_get_serializer()
    {
        $this->getSerializer()->shouldHaveType(Serializer::class);
    }
}
