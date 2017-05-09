<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace spec\Refinery29\ApiOutput\Resource\Error;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;

class ErrorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Something is wrong', 'Because reasons');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Error::class);
    }

    public function it_can_get_code()
    {
        $this->getCode()->shouldReturn('Because reasons');
    }

    public function it_can_get_title()
    {
        $this->getTitle()->shouldReturn('Something is wrong');
    }

    public function it_can_get_detail()
    {
        $this->setDetail('this is some detail');

        $this->getDetail()->shouldReturn('this is some detail');
    }

    public function it_can_get_id()
    {
        $this->setId('23j234ljs');

        $this->getId()->shouldReturn('23j234ljs');
    }

    public function it_can_get_links()
    {
        $this->getLinks()->shouldHaveType(LinkCollection::class);
    }

    public function it_can_add_about_links()
    {
        $link = Link::createAbout('http://yolo.com');
        $this->addAboutLink($link);
        $this->getLinks()->hasLink($link)->shouldReturn(true);
    }

    public function it_cannot_add_other_links()
    {
        $link = Link::createNext('http://yolo.com');
        $this->shouldThrow(\Exception::class)->duringAddAboutLink($link);
    }
}
