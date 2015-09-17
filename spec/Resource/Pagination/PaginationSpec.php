<?php

namespace spec\Refinery29\ApiOutput\Resource\Pagination;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Pagination\Pagination;

class PaginationSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(Pagination::class);
    }

    function it_can_add_first_link()
    {
        $this->addFirst('http://yolo');
        $this->getLinks()->shouldBeArray();
        $this->getLinks()->shouldHaveCount(1);
        $this->hasLink(Link::createFirst('http://yolo'));
    }

    function it_can_add_last_link()
    {
        $this->addLast('http://yolo');
        $this->getLinks()->shouldBeArray();
        $this->getLinks()->shouldHaveCount(1);
        $this->hasLink(Link::createLast('http://yolo'));
    }

    function it_can_add_prev_link()
    {
        $this->addPrevious('http://yolo');
        $this->getLinks()->shouldBeArray();
        $this->getLinks()->shouldHaveCount(1);
        $this->hasLink(Link::createPrev('http://yolo'));
    }

    function it_can_add_next_link()
    {
        $this->addNext('http://yolo');
        $this->getLinks()->shouldBeArray();
        $this->getLinks()->shouldHaveCount(1);
        $this->hasLink(Link::createNext('http://yolo'));
    }
}
