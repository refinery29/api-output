<?php

namespace spec\Refinery29\ApiOutput\Resource\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;

class LinkSpec extends ObjectBehavior
{

    function let()
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

    public function it_can_add_get_meta()
    {
        $this->addMeta('john', 'hopkins');

        $this->getMeta()->shouldContain('hopkins');
        $this->getMeta()->shouldHaveKey('john');
    }

    public function it_can_create_self_link()
    {
        $this->beConstructedThrough('createSelf', ['yolo.com']);

        $this->getName()->shouldReturn('self');
    }

    public function it_can_create_related_link()
    {
        $this->beConstructedThrough('createRelated', ['yolo.com']);

        $this->getName()->shouldReturn('related');
    }

    public function it_can_create_prev_link()
    {
        $this->beConstructedThrough('createPrev', ['yolo.com']);

        $this->getName()->shouldReturn('prev');
    }

    public function it_can_create_next_link()
    {
        $this->beConstructedThrough('createNext', ['yolo.com']);

        $this->getName()->shouldReturn('next');
    }

    public function it_can_create_first_link()
    {
        $this->beConstructedThrough('createFirst', ['yolo.com']);

        $this->getName()->shouldReturn('first');
    }

    public function it_can_create_last_link()
    {
        $this->beConstructedThrough('createLast', ['yolo.com']);

        $this->getName()->shouldReturn('last');
    }

    public function it_can_create_about_link()
    {
        $this->beConstructedThrough('createAbout', ['yolo.com']);

        $this->getName()->shouldReturn('about');
    }
}
