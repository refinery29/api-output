<?php

namespace spec\Refinery29\ApiOutput;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;
use Refinery29\ApiOutput\ResponseBody;
use Refinery29\ApiOutput\Serializer\Error\ErrorCollection;
use Refinery29\ApiOutput\Serializer\Link\LinkCollection as Serializer;
use Refinery29\ApiOutput\Serializer\Pagination\Pagination;
use Refinery29\ApiOutput\Serializer\Result;

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

    public function it_can_output_errors(ErrorCollection $serializer)
    {
        $collection = new \Refinery29\ApiOutput\Resource\Error\ErrorCollection();
        $collection->addError(new Error('something', 'something'));

        $serializer->beConstructedWith([$collection]);

        $this->addMember($serializer);
        $this->getMembers()->shouldBeArray();
        $this->getMembers()->shouldContain($serializer);

        $serializer->getTopLevelName()->willReturn('errors');

        $error = new \stdClass();
        $error->title = "something";
        $error->code = "something";
        $output = [$error];

        $serializer->getOutput()->willReturn($output);

        $this->getOutput()->shouldReturn('{"errors":[{"title":"something","code":"something"}]}');
    }

    public function it_can_output_result(Result $serializer)
    {
        $this->addMember($serializer);
        $this->getMembers()->shouldBeArray();
        $this->getMembers()->shouldContain($serializer);

        $obj = new \stdClass();
        $obj->yada = "yada";
        $obj->blah = "blah";

        $serializer->getOutput()->willReturn($obj);

        $serializer->getTopLevelName()->willReturn('result');

        $this->getOutput()->shouldReturn('{"result":{"yada":"yada","blah":"blah"}}');

    }

    public function it_can_output_pagination(Pagination $serializer)
    {
        $this->addMember($serializer);
        $this->getMembers()->shouldBeArray();
        $this->getMembers()->shouldContain($serializer);

        $pag = new \stdClass();
        $pag->first =  "http://yolo.com";
        $pag->last = "http://yolo.com";

        $serializer->getOutput()->willReturn($pag);

        $serializer->getTopLevelName()->willReturn('pagination');

        $this->getOutput()->shouldReturn('{"pagination":{"first":"http://yolo.com","last":"http://yolo.com"}}');

    }
}
