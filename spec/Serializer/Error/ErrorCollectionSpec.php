<?php

namespace spec\Refinery29\ApiOutput\Serializer\Error;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Refinery29\ApiOutput\Resource\Error\ErrorCollection;

class ErrorCollectionSpec extends ObjectBehavior
{
    public function let(ErrorCollection $collection)
    {
        $this->beConstructedWith($collection);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(\Refinery29\ApiOutput\Serializer\Error\ErrorCollection::class);
    }

    public function it_can_get_top_level_name(ErrorCollection $collection)
    {
        $this->beConstructedWith($collection);

        $this->getTopLevelName()->shouldReturn('errors');
    }
}
