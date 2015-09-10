<?php

namespace spec\Refinery29\ApiOutput\Serializer\Link;

use PhpSpec\ObjectBehavior;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;
use Refinery29\ApiOutput\Resource\Link\LinkSubset;
use Refinery29\ApiOutput\Serializer\Link\LinkCollection as Serializer;

class LinkCollectionSpec extends ObjectBehavior
{
    public function let(LinkCollection $input)
    {
        $this->beConstructedWith($input);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Serializer::class);
    }

    public function it_can_get_output_with_subsets()
    {
        $input = new LinkCollection();
        $subset = new LinkSubset('resources');
        $subset->addLink(new Link('http', 'yolo'));

        $input->addSubset($subset);
        $this->beConstructedWith($input);

        $output = '{"links":[{"resources":[{"href":"http","meta":"yolo"}]}]}';
        $this->getOutput()->shouldReturn($output);
    }

    public function it_can_get_output_with_only_links()
    {
        $input = new LinkCollection();
        $this->beConstructedWith($input);

        $link = new Link('http://yolo', 'yolo');

        $input->addLink($link);

        $output = '{"links":[{"href":"http://yolo","meta":"yolo"}]}';
        $this->getOutput()->shouldReturn($output);
    }

    public function it_outputs_subsets_when_both_links_and_subsets_are_present()
    {
        $input = new LinkCollection();
        $this->beConstructedWith($input);

        $link = new Link('http://yolo', 'yolo');
        $input->addLink($link);

        $subset = new LinkSubset('resources');
        $subset->addLink(new Link('http', 'yolo'));
        $input->addSubset($subset);

        $output = '{"links":[{"resources":[{"href":"http","meta":"yolo"}]}]}';
        $this->getOutput()->shouldReturn($output);
    }
}
