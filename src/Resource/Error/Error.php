<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Resource\Error;

use Refinery29\ApiOutput\Resource\Link\Link;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;
use Refinery29\ApiOutput\Serializer\Error\Error as Serializer;
use Refinery29\ApiOutput\Serializer\HasSerializer;

class Error implements HasSerializer
{
    /**
     * @var LinkCollection
     */
    protected $links;

    /**
     * @var string A short description of the error.
     */
    private $title;

    /**
     * @var string A unique identifer for this class of error (More specific than an HTTP Response Code)
     */
    private $code;

    /**
     * @var string A unique identifier (preferably a uuid or guid) for this instance of the error
     */
    private $id;

    /**
     * @var string A human-readable explanation specific to this occurrence of the problem.
     */
    private $detail;

    /**
     * @param string $title
     * @param string $code
     */
    public function __construct($title, $code)
    {
        $this->title = $title;
        $this->code = $code;

        $this->links = new LinkCollection();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param string $detail
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    /**
     * @return Serializer
     */
    public function getSerializer()
    {
        return new Serializer($this);
    }

    /**
     * @return LinkCollection
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param Link $link
     *
     * @throws \Exception
     */
    public function addAboutLink(Link $link)
    {
        if ($link->getName() !== 'about') {
            throw new \Exception('Error Objects only support "about" links');
        }

        $this->links->addLink($link);
    }
}
