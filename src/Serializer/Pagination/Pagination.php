<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Serializer\Pagination;

use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Pagination\Pagination as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\HasSerializer;

class Pagination implements TopLevelResource
{
    /**
     * @var Input|HasSerializer
     */
    protected $resource;

    public function __construct(HasSerializer $serializer)
    {
        if (!$serializer instanceof Input) {
            throw new \Exception('Invalid Resource provided for serializer');
        }

        $this->resource = $serializer;
    }

    /**
     * @return string
     */
    public function getTopLevelName()
    {
        return 'pagination';
    }

    /**
     * @return \stdClass
     */
    public function getOutput()
    {
        $output = new \stdClass();
        foreach ($this->resource->getLinks() as $link) {
            $this->buildSimpleLink($output, $link);
        }

        return $output;
    }

    /**
     * @param $output
     * @param Link $link
     *
     * @return \stdClass
     */
    public function buildSimpleLink($output, Link $link)
    {
        $name = $link->getName();

        $output->$name = $link->getHref();

        return $output;
    }
}
