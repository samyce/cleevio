<?php


namespace cleevio\exception;


use Throwable;

class MySqlWatchNotFoundException extends \Exception
{
    const MESSAGE = "Watch not found!";

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }
}