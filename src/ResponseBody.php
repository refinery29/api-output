<?php

namespace Refinery29\ApiOutput;

use Refinery29\ApiOutput\Resource\TopLevelResource;
use Refinery29\ApiOutput\Serializer\Serializer;

class ResponseBody
{
    /**
     * @var Serializer[]
     */
    protected $members = [];

    /**
     * @param Serializer $member
     *
     * @throws \Exception
     */
    public function addMember(Serializer $member)
    {
        if (! $member instanceof TopLevelResource) {
            throw new \Exception('Members added to Response Body must be instance of ' . TopLevelResource::class);
        }
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

        foreach ($this->members as $member) {
            $response[$member->getTopLevelName()] = $member->getOutput();
        }

        return json_encode((object) $response, JSON_UNESCAPED_SLASHES);
    }
}
