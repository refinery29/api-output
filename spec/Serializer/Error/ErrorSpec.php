<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace spec\Refinery29\ApiOutput\Serializer\Error;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;

class ErrorSpec extends ObjectBehavior
{
    public function it_must_pass_error()
    {
        $this->beConstructedWith(new LinkCollection());

        $this->shouldThrow(\Exception::class)->duringInstantiation();
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

    public function getMatchers()
    {
        return [
            'objectMatch' => function ($subject, $key) {
                return $subject == $key;
            },
        ];
    }
}
