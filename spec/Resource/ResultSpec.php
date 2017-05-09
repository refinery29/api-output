<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace spec\Refinery29\ApiOutput\Resource;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Result;

class ResultSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(['something' => 'value', 'this' => 'that', 'muppet' => 'henson']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Result::class);
    }

    public function it_can_get_data()
    {
        $this->getData()->shouldReturn(['something' => 'value', 'this' => 'that', 'muppet' => 'henson']);
    }
}
