<?php

namespace can\exceptions;


use can\base\Exception;

class UnknownPropertyException extends Exception
{
    public function getName()
    {
        return 'Unknown Property';
    }
}