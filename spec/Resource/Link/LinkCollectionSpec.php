<?php

namespace spec\Refinery29\ApiOutput\Resource\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;
use Refinery29\ApiOutput\Serializer\Link\LinkCollection as Serializer;

class LinkCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(LinkCollection::class);
    }

    public function it_can_add_a_named_link(Link $link)
    {
        $link->beConstructedWith(['name', 'http://yolo']);
        $this->addLink($link);

        $this->hasLink($link)->shouldReturn(true);
    }

    public function it_can_get_links()
    {
        $this->getLinks()->shouldBeArray();
    }

    public function it_can_get_serializer()
    {
        $this->getSerializer()->shouldHaveType(Serializer::class);
    }
}
