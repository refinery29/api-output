<?php

namespace spec\Refinery29\ApiOutput\Serializer\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\LinkSubset as Input;
use Refinery29\ApiOutput\Serializer\Link\LinkSubset;

class LinkSubsetSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(LinkSubset::class);
    }

    public function let()
    {
        $this->beConstructedWith(new Input('name'));
    }
}
