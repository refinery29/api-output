<?php

namespace spec\Refinery29\ApiOutput\Serializer\Error;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Link\Link;

class ErrorSpec extends ObjectBehavior
{
    public function it_must_pass_error()
    {
        $this->shouldThrow(\Exception::class)->duringInstantiation(Link::createFirst('http'));
    }

    public function it_can_get_default_output()
    {
        $this->beConstructedWith(new Error('title', 'code'));

        $object = new \stdClass();
        $object->title = "title";
        $object->code = "code";

        $this->getOutput()->shouldObjectMatch($object);

//        $this->getOutput()->shouldReturn('"errors":{"title":"title","code":"code"}');
    }

    public function getMatchers()
    {
        return [
            'objectMatch' => function ($subject, $key) {
                return $subject  == $key;
            },

        ];
    }
}
