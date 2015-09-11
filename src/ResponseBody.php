<?php

namespace Refinery29\ApiOutput;

use Refinery29\ApiOutput\Serializer\Serializer;

class ResponseBody
{
    private $response;

    /**
     * @var Serializer[]
     */
    protected $members = [];

    public function __construct()
    {
        $this->response = new \stdClass();
    }

    /**
     * @param Serializer $member
     */
    public function addMember(Serializer $member)
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

    public function getOutput()
    {
        foreach ($this->members as $member) {
            $this->response->{$member->getTopLevelName()} = $member->getOutput();
        }

        return json_encode($this->response, JSON_UNESCAPED_SLASHES);
    }
}
