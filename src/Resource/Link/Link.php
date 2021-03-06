<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Resource\Link;

class Link
{
    /**
     * @var string
     */
    protected $href;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $meta = [];

    /**
     * @param string|null $name
     * @param string      $href
     */
    private function __construct($name, $href)
    {
        $this->href = $href;
        $this->name = $name;
    }

    /**
     * @param $href
     *
     * @return Link
     */
    public static function createSelf($href)
    {
        return new self('self', $href);
    }

    /**
     * @param $href
     *
     * @return Link
     */
    public static function createRelated($href)
    {
        return new self('related', $href);
    }

    /**
     * @param $href
     *
     * @return Link
     */
    public static function createPrev($href)
    {
        return new self('prev', $href);
    }

    /**
     * @param $href
     *
     * @return Link
     */
    public static function createNext($href)
    {
        return new self('next', $href);
    }

    /**
     * @param $href
     *
     * @return Link
     */
    public static function createFirst($href)
    {
        return new self('first', $href);
    }

    /**
     * @param $href
     *
     * @return Link
     */
    public static function createLast($href)
    {
        return new self('last', $href);
    }

    /**
     * @param $href
     *
     * @return Link
     */
    public static function createAbout($href)
    {
        return new self('about', $href);
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function addMeta($name, $value)
    {
        $this->meta[$name] = $value;
    }

    /**
     * @return null|string
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
