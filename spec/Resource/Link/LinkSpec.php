<?php

namespace spec\Refinery29\ApiOutput\Resource\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;

class LinkSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('createSelf', ['http://yolo.com']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Link::class);
    }

    public function it_can_get_href()
    {
        $this->getHref()->shouldReturn('http://yolo.com');
    }

    public function it_can_get_name()
    {
        $this->getName()->shouldReturn('self');
    }
}
