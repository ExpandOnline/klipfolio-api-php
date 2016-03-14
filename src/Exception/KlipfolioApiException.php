<?php namespace ExpandOnline\KlipfolioApi\Exception;

use Exception;

class KlipfolioApiException extends \Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}