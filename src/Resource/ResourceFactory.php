<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Resource;

use Refinery29\ApiOutput\Resource\Error\Error;
use Refinery29\ApiOutput\Resource\Error\ErrorCollection;
use Refinery29\ApiOutput\Resource\Link\LinkCollection;

abstract class ResourceFactory
{
    /**
     * @param array $data
     *
     * @return Result
     */
    public static function result(array $data)
    {
        return new Result($data);
    }

    /**
     * @param array $data
     *
     * @return CustomResult
     */
    public static function customResult(array $data)
    {
        return new CustomResult($data);
    }

    /**
     * @param array $errors
     *
     * @return ErrorCollection
     */
    public static function errorCollection(array $errors = [])
    {
        return new ErrorCollection($errors);
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
