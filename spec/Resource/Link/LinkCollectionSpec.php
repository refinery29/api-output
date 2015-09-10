<?php

namespace spec\Refinery29\ApiOutput\Resource\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;
use Refinery29\ApiOutput\Resource\Link\LinkSubset;
use Refinery29\ApiOutput\Serializer\Link\LinkCollection as Serializer;

class LinkCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(LinkCollection::class);
    }

    public function it_can_add_link(Link $link)
    {
        $link->beConstructedWith(['http://yolo']);
        $this->addLink($link);

        $this->hasLink($link)->shouldReturn(true);
    }

    public function it_can_get_links()
    {
        $this->getLinks()->shouldBeArray();
    }

    public function it_can_add_subset()
    {
        $subset = new LinkSubset('someName');

        $this->addSubset($subset);
    }

    public function it_can_get_subsets()
    {
        $this->getSubsets()->shouldBeArray();
    }

    public function it_can_get_serializer()
    {
        $this->getSerializer()->shouldHaveType(Serializer::class);
    }
}
