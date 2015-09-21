<?php

namespace Refinery29\ApiOutput\Resource;

use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Error\ErrorCollection;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;

abstract class ResourceFactory
{
    /**
     * @param $data
     *
     * @return Result
     */
    public static function result(array $data)
    {
        return new Result($data);
    }

    /**
     * @return ErrorCollection
     */
    public static function errorCollection()
    {
        return new ErrorCollection();
    }

    /**
     * @param string $title
     * @param string $code
     *
     * @return Error
     */
    public static function error($title, $code)
    {
        return new Error($title, $code);
    }

    /**
     * @return LinkCollection
     */
    public static function linkCollection()
    {
        return new LinkCollection();
    }
}
