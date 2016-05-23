<?php

namespace spec\Refinery29\ApiOutput\Resource\CustomResult;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\CustomResult\CustomResult;

class CustomResultSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(['something' => 'value', 'this' => 'that', 'muppet' => 'henson']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CustomResult::class);
    }

    public function it_can_get_data()
    {
        $this->getData()->shouldReturn(['something' => 'value', 'this' => 'that', 'muppet' => 'henson']);
    }
}
