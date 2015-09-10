<?php

namespace spec\Refinery29\ApiOutput\Resource\Error;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;

class ErrorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Something is wrong', 'Because reasons');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Error::class);
    }

    function it_can_get_code()
    {
        $this->getCode()->shouldReturn('Because reasons');
    }

    function it_can_get_title()
    {
        $this->getTitle()->shouldReturn('Something is wrong');
    }

    function it_can_get_detail()
    {
        $this->setDetail('this is some detail');

        $this->getDetail()->shouldReturn('this is some detail');
    }

    function it_can_get_id()
    {
        $this->setId('23j234ljs');

        $this->getId()->shouldReturn('23j234ljs');
    }

    function it_can_get_links()
    {
        $this->getLinks()->shouldHaveType(LinkCollection::class);
    }

    function it_can_add_links()
    {
        $link = new Link('http://yolo.com');
        $this->addLink($link);
        $this->getLinks()->hasLink($link)->shouldReturn(true);
    }
}
