<?php

namespace Refinery29\ApiOutput;

use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\Serializer;

class ResponseBody
{
    /**
     * @var TopLevelResource[]
     */
    protected $members = [];

    /**
     * @param TopLevelResource $member
     *
     * @throws \Exception
     */
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

    /**mae
     * @return string JSON representation of the response.
     */

    public function getOutput()
    {
        $response = [];

        if (count($this->members) == 1) {
            $member = $this->members[0];
            if ($member->getTopLevelName() === '') {
                $response = $member->getOutput();
                return json_encode((object) $response, JSON_UNESCAPED_SLASHES);
            }
        }

        foreach ($this->members as $member) {
            $response[$member->getTopLevelName()] = $member->getOutput();
        }

        return json_encode((object) $response, JSON_UNESCAPED_SLASHES);
    }
}
