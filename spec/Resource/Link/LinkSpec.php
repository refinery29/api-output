<?php

namespace spec\Refinery29\ApiOutput\Resource\Link;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Refinery29\ApiOutput\Serializer\Link\Link as Serializer;
use Refinery29\ApiOutput\Resource\Link\Link;

class LinkSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('http://yolo.com');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Link::class);
    }

    public function it_can_get_href()
    {
        $this->getHref()->shouldReturn('http://yolo.com');
    }

    function it_can_get_meta()
    {
        $this->beConstructedWith('http://yolo.com', 'something-meta');

        $this->getMeta()->shouldReturn('something-meta');
    }

    function it_can_get_serializer()
    {
        $this->getSerializer()->shouldHaveType(Serializer::class);
    }
}
