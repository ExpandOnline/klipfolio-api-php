<?php namespace ExpandOnline\KlipfolioApi\Exception;

use Exception;

class NotImplementedException extends \RuntimeException
{
    public function __construct($message = 'Not implemented', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}