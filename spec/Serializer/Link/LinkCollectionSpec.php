<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace spec\Refinery29\ApiOutput\Serializer\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;

class LinkCollectionSpec extends ObjectBehavior
{
    public function it_can_get_output_with_links()
    {
        $input = new LinkCollection();
        $link = Link::createSelf('http://yolo');
        $input->addLink($link);

        $this->beConstructedWith($input);

        $this->getOutput()->shouldHavePropertyWithValue(['self', 'http://yolo']);
    }

    public function it_can_get_output_with_meta_links()
    {
        $input = new LinkCollection();
        $link = Link::createSelf('http://yolo');
        $link->addMeta('jedi', 'yoda');
        $link->addMeta('sith', 'darth vader');
        $input->addLink($link);

        $this->beConstructedWith($input);

        $output = new \stdClass();
        $output->self = new \stdClass();
        $output->self->meta = new \stdClass();
        $output->self->meta->jedi = 'yoda';
        $output->self->meta->sith = 'darth vader';
        $output->self->href = 'http://yolo';

        $this->getOutput()->shouldObjectMatch($output);
    }

    public function it_can_get_top_level_name()
    {
        $this->beConstructedWith(new LinkCollection());

        $this->getTopLevelName()->shouldReturn('links');
    }

    public function getMatchers()
    {
        return [
            'havePropertyWithValue' => function ($subject, $key) {
                return $subject->{$key[0]} == $key[1];
            },
            'objectMatch' => function ($subject, $key) {
                return $subject == $key;
            },
        ];
    }
}
