<?php namespace ExpandOnline\KlipfolioApi\Exception;

use Exception;

/**
 * Class NotImplementedException
 * @package ExpandOnline\KlipfolioApi\Exception
 */
class NotImplementedException extends \RuntimeException
{
    /**
     * NotImplementedException constructor.
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message = 'Not implemented', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}