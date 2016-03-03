<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 3-3-16
 * Time: 15:59
 */

namespace ExpandOnline\KlipfolioApi\Exceptions;



class NotYetImplementedException extends \RuntimeException
{
    public function __construct($message = 'Not yet implemented', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}