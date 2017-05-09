<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace spec\Refinery29\ApiOutput\Serializer\Pagination;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Pagination\Pagination as Input;
use Refinery29\ApiOutput\Serializer\Pagination\Pagination;

class PaginationSpec extends ObjectBehavior
{
    public function let(Input $pagination)
    {
        $this->beConstructedWith($pagination);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Pagination::class);
    }

    public function it_can_get_top_level_name()
    {
        $this->getTopLevelName()->shouldReturn('pagination');
    }

    public function it_must_pass_error_collection()
    {
        $this->shouldThrow(\Exception::class)->during('__construct', [new Error('type', 'name')]);
    }

    public function it_can_get_output(Input $pagination)
    {
        $this->beConstructedWith($pagination);

        $pag = new \stdClass();
        $pag->first = 'http://yolo.com';
        $pag->last = 'http://yolo.com';

        $pagination->getLinks()->willReturn(
            [
                Link::createFirst('http://yolo.com'),
                Link::createLast('http://yolo.com'),
            ]);

        $this->getOutput()->shouldObjectMatch($pag);
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
