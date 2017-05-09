<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput\Serializer;

interface Serializer
{
    public function __construct(HasSerializer $serializer);

    public function getOutput();
}
