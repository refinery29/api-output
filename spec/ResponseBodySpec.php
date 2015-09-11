<?php

namespace spec\Refinery29\ApiOutput;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;
use Refinery29\ApiOutput\ResponseBody;
use Refinery29\ApiOutput\Serializer\Link\LinkCollection as Serializer;

class ResponseBodySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ResponseBody::class);
    }

    public function it_can_add_members(Serializer $serializer)
    {
        $collection = new LinkCollection();
        $serializer->beConstructedWith([$collection]);

        $this->addMember($serializer);
        $this->getMembers()->shouldBeArray();

        $this->getMembers()->shouldContain($serializer);
    }

    public function it_can_output_link_collections(Serializer $serializer)
    {
        $collection = new LinkCollection();
        $collection->addLink(Link::createSelf('http://example.com/articles/1'));

        $serializer->beConstructedWith([$collection]);

        $this->addMember($serializer);
        $this->getMembers()->shouldBeArray();
        $this->getMembers()->shouldContain($serializer);

        $serializer->getTopLevelName()->willReturn('links');

        $output = new \stdClass();
        $output->self = 'http://example.com/articles/1';

        $serializer->getOutput()->willReturn($output);

        $this->getOutput()->shouldReturn('{"links":{"self":"http://example.com/articles/1"}}');
    }

    public function it_can_output_link_collections_with_meta(Serializer $serializer)
    {
        $collection = new LinkCollection();

        $link = Link::createSelf('http://example.com/articles/1');
        $link->addMeta('jedi', 'yoda');
        $collection->addLink($link);

        $serializer->beConstructedWith([$collection]);

        $this->addMember($serializer);
        $this->getMembers()->shouldBeArray();
        $this->getMembers()->shouldContain($serializer);

        $serializer->getTopLevelName()->willReturn('links');

        $output = new \stdClass();
        $output->self = new \stdClass();
        $output->self->href = 'http://example.com/articles/1';
        $output->self->meta = new \stdClass();
        $output->self->meta->jedi = 'yoda';

        $serializer->getOutput()->willReturn($output);

        $this->getOutput()->shouldReturn('{"links":{"self":{"href":"http://example.com/articles/1","meta":{"jedi":"yoda"}}}}');
    }
}
