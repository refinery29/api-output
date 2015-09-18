<?php

namespace spec\Refinery29\ApiOutput\Serializer\Error;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Error\ErrorCollection;

class ErrorCollectionSpec extends ObjectBehavior
{
    public function let(ErrorCollection $collection)
    {
        $this->beConstructedWith($collection);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(\Refinery29\ApiOutput\Serializer\Error\ErrorCollection::class);
    }

    public function it_can_get_top_level_name(ErrorCollection $collection)
    {
        $this->beConstructedWith($collection);

        $this->getTopLevelName()->shouldReturn('errors');
    }

    public function it_must_pass_error_collection()
    {
        $this->shouldThrow(\Exception::class)->during('__construct', [new Error('type', 'name')]);
    }
}
