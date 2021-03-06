<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace spec\Refinery29\ApiOutput\Serializer;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Result;

class ResultSpec extends ObjectBehavior
{
    public function it_is_initializable(Result $result)
    {
        $this->beConstructedWith($result);
        $this->shouldHaveType(\Refinery29\ApiOutput\Serializer\Result::class);
    }

    public function it_Must_be_constructed_with_result(Error $error)
    {
        $this->shouldThrow(\Exception::class)->during('__construct', [$error]);
    }

    public function it_can_get_output(Result $result)
    {
        $this->beConstructedWith($result);

        $output = ['something' => 'value', 'this' => 'that', 'muppet' => 'henson'];

        $result->getData()->willReturn($output);

        $this->getOutput()->shouldObjectMatch($output);
    }

    public function it_can_get_top_level_name(Result $result)
    {
        $this->beConstructedWith($result);
        $this->getTopLevelName()->shouldReturn('result');
    }

    public function getMatchers()
    {
        return [
            'objectMatch' => function ($subject, $key) {
                return $subject == $key;
            },
        ];
    }
}
