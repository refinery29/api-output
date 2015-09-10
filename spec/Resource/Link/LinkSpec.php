<?php

namespace spec\Refinery29\ApiOutput\Resource\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Serializer\Link\Link as Serializer;

class LinkSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('http://yolo.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Link::class);
    }

    public function it_can_get_href()
    {
        $this->getHref()->shouldReturn('http://yolo.com');
    }

    public function it_can_get_meta()
    {
        $this->beConstructedWith('http://yolo.com', 'something-meta');

        $this->getMeta()->shouldReturn('something-meta');
    }

    public function it_can_get_serializer()
    {
        $this->getSerializer()->shouldHaveType(Serializer::class);
    }
}
