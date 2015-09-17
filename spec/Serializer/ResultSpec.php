<?php

namespace spec\Refinery29\ApiOutput\Serializer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Result;

class ResultSpec extends ObjectBehavior
{

    function it_is_initializable(Result $result)
    {
        $this->beConstructedWith($result);
        $this->shouldHaveType(\Refinery29\ApiOutput\Serializer\Result::class);
    }

    function it_Must_be_constructed_with_result(Error $error)
    {
        $this->shouldThrow(\Exception::class)->during('__construct', [$error]);
    }

    function it_can_get_output(Result $result)
    {
        $this->beConstructedWith($result);
        $result->getData()->willReturn(['something' => 'value', 'this' => 'that', 'muppet' => 'henson']);

        $object = new \stdClass();
        $object->something = 'value';
        $object->this = 'that';
        $object->muppet = 'henson';

        $this->getOutput()->shouldObjectMatch($object);
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
