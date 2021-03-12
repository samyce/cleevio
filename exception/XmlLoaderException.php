<?php


namespace cleevio\exception;


class XmlLoaderException extends \Exception
{
    const MESSAGE = "Xml loader exception!";

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }
}