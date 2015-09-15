<?php

namespace spec\Refinery29\ApiOutput\Serializer\Error;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;

class ErrorSpec extends ObjectBehavior
{
    public function it_must_pass_error()
    {
        $this->shouldThrow(\Exception::class)->duringInstantiation(new LinkCollection());
    }

    public function it_can_get_default_output()
    {
        $error = new Error('title', 'code');
        $error->setDetail('some detail');
        $error->setId('yolol');

        $this->beConstructedWith($error);

        $object = new \stdClass();
        $object->title = 'title';
        $object->code = 'code';
        $object->detail = 'some detail';
        $object->id = 'yolol';

        $this->getOutput()->shouldObjectMatch($object);
    }

    public function it_can_get_top_level_name()
    {
        $this->beConstructedWith(new Error('title', 'code'));

        $this->getTopLevelName()->shouldReturn('errors');
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
