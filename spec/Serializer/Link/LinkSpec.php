<?php

namespace spec\Refinery29\ApiOutput\Serializer\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link as Input;
use Refinery29\ApiOutput\Serializer\Link\Link;

class LinkSpec extends ObjectBehavior
{
    public function let()
    {
        $link = new Input('href', 'meta');
        $this->beConstructedWith($link);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Link::class);
    }

    public function it_can_get_output_with_meta()
    {
        $output = '{"href":"href","meta":"meta"}';
        $this->getOutput()->shouldReturn($output);
    }
}
