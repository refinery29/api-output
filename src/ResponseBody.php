<?php

/*
 * Copyright (c) 2017 Refinery29, Inc.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Refinery29\ApiOutput;

use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\CustomResult;
use Refinery29\ApiOutput\Serializer\Serializer;

class ResponseBody
{
    /**
     * @var TopLevelResource[]
     */
    protected $members = [];

    public function addMember(TopLevelResource $member)
    {
        $this->members[] = $member;
    }

    /**
     * @return Serializer[]
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @return string JSON representation of the response.
     */
    public function getOutput()
    {
        $response = [];
        \reset($this->members);
        $member = \current($this->getMembers());

        if ($member instanceof CustomResult) {
            return \json_encode((object) $member->getOutput(), JSON_UNESCAPED_SLASHES);
        }

        foreach ($this->members as $member) {
            $response[$member->getTopLevelName()] = $member->getOutput();
        }

        return \json_encode((object) $response, JSON_UNESCAPED_SLASHES);
    }
}
