<?php

namespace Refinery29\ApiOutput\Serializer;


trait HasArrayComponent
{
    protected function processArray(array $input)
    {
        $output = [];

        foreach ($input as $item){
            $output[] = json_decode($item->getSerializer()->getOutput());
        }

        return $output;
    }
}