<?php

namespace can\base;


class Exception extends \Exception
{
    public function getName()
    {
        return 'Exception';
    }
}