<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace spec\Refinery29\ApiOutput\Resource\Pagination;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Pagination\Pagination;

class PaginationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Pagination::class);
    }

    public function it_can_add_first_link()
    {
        $this->addFirst('http://yolo');
        $this->getLinks()->shouldBeArray();
        $this->getLinks()->shouldHaveCount(1);
        $this->hasLink(Link::createFirst('http://yolo'));
    }

    public function it_can_add_last_link()
    {
        $this->addLast('http://yolo');
        $this->getLinks()->shouldBeArray();
        $this->getLinks()->shouldHaveCount(1);
        $this->hasLink(Link::createLast('http://yolo'));
    }

    public function it_can_add_prev_link()
    {
        $this->addPrevious('http://yolo');
        $this->getLinks()->shouldBeArray();
        $this->getLinks()->shouldHaveCount(1);
        $this->hasLink(Link::createPrev('http://yolo'));
    }

    public function it_can_add_next_link()
    {
        $this->addNext('http://yolo');
        $this->getLinks()->shouldBeArray();
        $this->getLinks()->shouldHaveCount(1);
        $this->hasLink(Link::createNext('http://yolo'));
    }
}
