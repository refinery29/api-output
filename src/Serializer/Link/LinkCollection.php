<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Serializer\Link;

use Exception;
use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection as Input;
use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\HasSerializer;

class LinkCollection implements TopLevelResource
{
    /**
     * @var Input
     */
    protected $resource;

    /**
     * @param HasSerializer $linkCollection
     *
     * @throws Exception
     */
    public function __construct(HasSerializer $linkCollection)
    {
        if (!$linkCollection instanceof Input) {
            throw new Exception('Incorrect Serializer passed');
        }
        $this->resource = $linkCollection;
    }

    /**
     * @return \stdClass
     */
    public function getOutput()
    {
        $output = new \stdClass();

        foreach ($this->resource->getLinks() as $link) {
            if ($link->getMeta()) {
                $this->buildMetaLink($output, $link);
            } else {
                $this->buildSimpleLink($output, $link);
            }
        }

        return $output;
    }

    /**
     * @return string
     */
    public function getTopLevelName()
    {
        return 'links';
    }

    /**
     * @param Link  $link
     * @param mixed $output
     *
     * @return \stdClass
     */
    public function buildSimpleLink($output, Link $link)
    {
        $name = $link->getName();

        $output->$name = $link->getHref();

        return $output;
    }

    /**
     * @param Link  $link
     * @param mixed $output
     *
     * @return \stdClass
     */
    public function buildMetaLink($output, Link $link)
    {
        $name = $link->getName();

        $output->$name = new \stdClass();
        $output->$name->href = $link->getHref();
        $output->$name->meta = (object) $link->getMeta();

        return $output;
    }
}
