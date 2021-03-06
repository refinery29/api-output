<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace spec\Refinery29\ApiOutput\Serializer;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\CustomResult;
use Refinery29\ApiOutput\Resource\Error\Error;

class CustomResultSpec extends ObjectBehavior
{
    public function it_is_initializable(CustomResult $customResult)
    {
        $this->beConstructedWith($customResult);
        $this->shouldHaveType(\Refinery29\ApiOutput\Serializer\CustomResult::class);
    }

    public function it_Must_be_constructed_with_result(Error $error)
    {
        $this->shouldThrow(\Exception::class)->during('__construct', [$error]);
    }

    public function it_can_get_output(CustomResult $result)
    {
        $this->beConstructedWith($result);

        $output = ['something' => 'value', 'this' => 'that', 'muppet' => 'henson'];

        $result->getData()->willReturn($output);

        $this->getOutput()->shouldObjectMatch($output);
    }

    public function it_can_get_top_level_name(CustomResult $result)
    {
        $this->beConstructedWith($result);
        $this->getTopLevelName()->shouldReturn('');
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
