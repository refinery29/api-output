<?php

namespace Refinery29\ApiOutput\Resource\Error;

use Refinery29\ApiOutput\Resource\Link\LinkCollection;
use Refinery29\ApiOutput\Serializer\HasSerializer;
use Refinery29\ApiOutput\Serializer\Error\Error as Serializer;

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
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param string $link
     */
    public function addLink($link)
    {
        $this->links->addLink($link);
    }
}